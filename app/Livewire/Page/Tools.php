<?php

namespace App\Livewire\Page;

use Livewire\Component;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Tools extends Component
{
    // Active tool section
    public $activeTool = null;

    // QR Code Generator properties
    public $qrText = '';
    public $qrSize = 300;
    public $qrCodeDataUri = null;
    public $qrError = null;

    // Random String Generator properties
    public $stringLength = 16;
    public $includeUppercase = true;
    public $includeLowercase = true;
    public $includeNumbers = true;
    public $includeSymbols = false;
    public $generatedString = '';

    /**
     * Mount the component and check for tool query parameter
     */
    public function mount()
    {
        $tool = request()->query('tool');
        if ($tool && in_array($tool, ['qr-code', 'string-generator'])) {
            $this->activeTool = $tool;
        }
    }

    /**
     * Open a tool section
     */
    public function openTool($toolName)
    {
        // If clicking the same tool, close it
        if ($this->activeTool === $toolName) {
            $this->activeTool = null;
            return;
        }

        $this->activeTool = $toolName;
        
        // Reset tool-specific data when switching
        if ($toolName === 'qr-code') {
            $this->reset(['qrText', 'qrCodeDataUri', 'qrError']);
        } elseif ($toolName === 'string-generator') {
            $this->reset(['generatedString']);
        }

        // Scroll will be handled by Alpine.js in the view
    }

    /**
     * Generate QR Code
     */
    public function generateQrCode()
    {
        // Reset error
        $this->qrError = null;
        $this->qrCodeDataUri = null;

        $this->validate([
            'qrText' => 'required|string|max:2000',
        ]);

        try {
            // Check if required extensions are available
            if (!extension_loaded('gd') && !extension_loaded('imagick')) {
                throw new \Exception('GD or Imagick extension is required for QR code generation.');
            }

            // Validate size
            if ($this->qrSize < 100 || $this->qrSize > 1000) {
                $this->qrSize = 300; // Reset to default if invalid
            }

            // Create builder with proper error handling
            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                validateResult: false,
                data: $this->qrText,
                encoding: new Encoding('UTF-8'),
                size: $this->qrSize,
                margin: 10
            );

            $result = $builder->build();

            // Get QR code as data URI
            $qrCodeImage = $result->getString();
            
            if (empty($qrCodeImage)) {
                throw new \Exception('QR code generation returned empty result.');
            }
            
            // Add logo in the center (commented out for now)
            // $qrCodeImage = $this->addLogoToQrCode($qrCodeImage);
            
            $this->qrCodeDataUri = 'data:image/png;base64,' . base64_encode($qrCodeImage);
            
            // Verify the data URI was created
            if (empty($this->qrCodeDataUri)) {
                throw new \Exception('Failed to encode QR code image.');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->qrError = 'Validation error: ' . implode(', ', $e->errors()['qrText'] ?? ['Invalid input']);
            Log::error('QR Code Validation Error', ['error' => $e->getMessage(), 'input' => $this->qrText]);
        } catch (\Exception $e) {
            $this->qrError = 'Failed to generate QR code. Please try again.';
            Log::error('QR Code Generation Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input_length' => strlen($this->qrText),
                'size' => $this->qrSize
            ]);
        }
    }

    /**
     * Add Lovilink logo to center of QR code
     */
    private function addLogoToQrCode($qrCodeImage)
    {
        // Create image from QR code
        $qrImage = imagecreatefromstring($qrCodeImage);
        $qrWidth = imagesx($qrImage);
        $qrHeight = imagesy($qrImage);

        // Logo area size (20% of QR code size)
        $logoSize = (int)($qrWidth * 0.2);
        $logoX = ($qrWidth - $logoSize) / 2;
        $logoY = ($qrHeight - $logoSize) / 2;

        // Add white background square for logo
        $white = imagecolorallocate($qrImage, 255, 255, 255);
        $padding = 8;
        imagefilledrectangle($qrImage, $logoX - $padding, $logoY - $padding, $logoX + $logoSize + $padding, $logoY + $logoSize + $padding, $white);

        // Add border around logo area
        $black = imagecolorallocate($qrImage, 0, 0, 0);
        imagerectangle($qrImage, $logoX - $padding, $logoY - $padding, $logoX + $logoSize + $padding, $logoY + $logoSize + $padding, $black);

        // Add "Lovilink" text in the center
        $text = 'Lovilink';
        $textColor = imagecolorallocate($qrImage, 0, 0, 0);
        
        // Use built-in font (1-5, 5 is largest)
        $font = 5;
        $textWidth = imagefontwidth($font) * strlen($text);
        $textHeight = imagefontheight($font);
        $textX = $logoX + ($logoSize - $textWidth) / 2;
        $textY = $logoY + ($logoSize - $textHeight) / 2;
        
        imagestring($qrImage, $font, $textX, $textY, $text, $textColor);

        // Output image to string
        ob_start();
        imagepng($qrImage);
        $imageData = ob_get_contents();
        ob_end_clean();
        
        imagedestroy($qrImage);

        return $imageData;
    }

    /**
     * Generate Random String
     */
    public function generateString()
    {
        $this->validate([
            'stringLength' => 'required|integer|min:4|max:256',
        ]);

        $characters = '';
        
        if ($this->includeUppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($this->includeLowercase) {
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($this->includeNumbers) {
            $characters .= '0123456789';
        }
        if ($this->includeSymbols) {
            $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
        }

        if (empty($characters)) {
            session()->flash('string_error', 'Please select at least one character type.');
            return;
        }

        // Generate random string from custom character set
        $result = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $this->stringLength; $i++) {
            $result .= $characters[random_int(0, $charactersLength - 1)];
        }

        $this->generatedString = $result;
    }

    /**
     * Copy generated string to clipboard
     */
    public function copyString()
    {
        $this->dispatch('copy-to-clipboard', text: $this->generatedString);
    }

    /**
     * Download QR Code
     */
    public function downloadQrCode()
    {
        if ($this->qrCodeDataUri) {
            $this->dispatch('download-qr-code', dataUri: $this->qrCodeDataUri);
        }
    }

    public function render()
    {
        return view('livewire.page.tools')->layout('layouts.home');
    }
}
