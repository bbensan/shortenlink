<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Log;

class QrCodeGenerator extends Component
{
    // QR Code Generator properties
    public $qrText = '';
    public $qrSize = 300;
    public $qrCodeDataUri = null;
    public $qrError = null;
    
    public $breadcrumbs = [];

    public function mount()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Dashboard', 'url' => route('dashboard-home')],
            ['label' => 'QR Code Generator', 'url' => route('dashboard-qr-generator')],
        ];
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
        return view('livewire.dashboard.qr-code-generator')
            ->layout('layouts.dashboard', [
                'breadcrumbs' => $this->breadcrumbs,
            ]);
    }
}

