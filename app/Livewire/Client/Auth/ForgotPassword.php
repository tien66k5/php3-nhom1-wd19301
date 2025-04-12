<?php

namespace App\Livewire\Client\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Đã gửi liên kết đặt lại mật khẩu tới email!');
        } else {
            $this->addError('email', 'Gửi email thất bại!');
        }
    }

    public function render()
    {
        return view('livewire.client.auth.forgot-password');
    }
}
