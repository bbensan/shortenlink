<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;

class Profile extends Component
{
    public $breadcrumbs = [];
    
    // Profile Information
    public $name = '';
    public $email = '';
    public $emailVerified = false;
    
    // Change Email
    public $showEmailForm = false;
    public $newEmail = '';
    public $emailPassword = '';
    
    // Change Password
    public $currentPassword = '';
    public $newPassword = '';
    public $newPassword_confirmation = '';
    public $showPasswordForm = false;
    public $currentPasswordValid = null; // null = not checked, true = valid, false = invalid
    
    // Delete Account
    public $showDeleteModal = false;
    public $deletePassword = '';
    public $deleteConfirmation = '';

    public function mount()
    {
        $user = Auth::user();
        
        $this->name = $user->name;
        $this->email = $user->email;
        $this->emailVerified = $user->email_verified_at !== null;
        
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Dashboard', 'url' => route('dashboard-home')],
            ['label' => 'Profile', 'url' => route('dashboard-profile')],
        ];
    }

    /**
     * Update profile name
     */
    public function updateName()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Name updated successfully.');
    }

    /**
     * Resend email verification
     */
    public function resendVerificationEmail()
    {
        $user = Auth::user();
        
        if ($user->email_verified_at !== null) {
            session()->flash('info', 'Your email is already verified.');
            return;
        }

        // Send verification notification via event
        // This will trigger SendEmailVerificationNotification listener
        event(new Registered($user));
        
        session()->flash('success', 'Verification email sent! Please check your inbox.');
    }

    /**
     * Toggle email form
     */
    public function toggleEmailForm()
    {
        $this->showEmailForm = !$this->showEmailForm;
        if (!$this->showEmailForm) {
            $this->newEmail = '';
            $this->emailPassword = '';
            $this->resetErrorBag('newEmail');
            $this->resetErrorBag('emailPassword');
        }
    }

    /**
     * Update email
     */
    public function updateEmail()
    {
        $this->validate([
            'newEmail' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'emailPassword' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->emailPassword, $user->password)) {
            $this->addError('emailPassword', 'The password is incorrect.');
            return;
        }

        $user->update([
            'email' => $this->newEmail,
            'email_verified_at' => null, // Reset verification when email changes
        ]);

        $this->email = $this->newEmail;
        $this->emailVerified = false;
        $this->showEmailForm = false;
        $this->newEmail = '';
        $this->emailPassword = '';

        session()->flash('success', 'Email updated successfully. Please verify your new email address.');
    }

    /**
     * Validate current password with debounce
     */
    public function validateCurrentPassword()
    {
        if (empty($this->currentPassword)) {
            $this->currentPasswordValid = null;
            $this->resetErrorBag('currentPassword');
            return;
        }

        $user = Auth::user();
        $this->currentPasswordValid = Hash::check($this->currentPassword, $user->password);
        
        if (!$this->currentPasswordValid) {
            $this->addError('currentPassword', 'The current password is incorrect.');
        } else {
            $this->resetErrorBag('currentPassword');
        }
    }

    /**
     * Toggle password form
     */
    public function togglePasswordForm()
    {
        $this->showPasswordForm = !$this->showPasswordForm;
        $this->resetPasswordFields();
    }

    /**
     * Reset password fields
     */
    private function resetPasswordFields()
    {
        $this->currentPassword = '';
        $this->newPassword = '';
        $this->newPassword_confirmation = '';
        $this->currentPasswordValid = null;
        $this->resetErrorBag();
    }

    /**
     * Update password
     */
    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = Auth::user();

        if (!Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'The current password is incorrect.');
            $this->currentPasswordValid = false;
            return;
        }

        $user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        session()->flash('success', 'Password updated successfully.');
        $this->resetPasswordFields();
        $this->showPasswordForm = false;
        $this->currentPasswordValid = null;
    }

    /**
     * Open delete account modal
     */
    public function openDeleteModal()
    {
        $this->showDeleteModal = true;
        $this->deletePassword = '';
        $this->deleteConfirmation = '';
    }

    /**
     * Close delete account modal
     */
    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->deletePassword = '';
        $this->deleteConfirmation = '';
    }

    /**
     * Delete account
     */
    public function deleteAccount()
    {
        $this->validate([
            'deletePassword' => 'required',
            'deleteConfirmation' => 'required|in:DELETE',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->deletePassword, $user->password)) {
            $this->addError('deletePassword', 'The password is incorrect.');
            return;
        }

        // Logout before deleting
        Auth::logout();
        
        // Delete user account
        $user->delete();
        
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        session()->flash('success', 'Your account has been deleted successfully.');
        
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.dashboard.profile')->layout('layouts.dashboard', [
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}

