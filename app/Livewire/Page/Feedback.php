<?php

namespace App\Livewire\Page;

use App\Models\Feedback as FeedbackModel;
use Livewire\Component;

class Feedback extends Component
{
    public $name = '';
    public $email = '';
    public $category = '';
    public $message = '';
    public $showSuccessNotice = false;
    public $showErrorNotice = false;
    public $errorMessage = '';

    public function submitFeedback()
    {
        $this->reset(['showSuccessNotice', 'showErrorNotice', 'errorMessage']);

        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'category' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ]);

            FeedbackModel::create([
                'name' => $this->name,
                'email' => $this->email,
                'category' => $this->category,
                'message' => $this->message,
            ]);

            // Reset form
            $this->reset(['name', 'email', 'category', 'message']);
            
            // Show success notice
            $this->showSuccessNotice = true;

            // Auto-hide success notice after 5 seconds
            $this->dispatch('feedback-submitted');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->showErrorNotice = true;
            $this->errorMessage = 'Please fill in all required fields correctly.';
        } catch (\Exception $e) {
            $this->showErrorNotice = true;
            $this->errorMessage = 'An error occurred while submitting your feedback. Please try again.';
        }
    }

    public function closeNotice()
    {
        $this->reset(['showSuccessNotice', 'showErrorNotice', 'errorMessage']);
    }

    public function render()
    {
        return view('livewire.page.feedback')->layout('layouts.home');
    }
}
