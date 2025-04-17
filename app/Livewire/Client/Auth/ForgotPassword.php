<?php

namespace App\Livewire\Client\Auth;
use Illuminate\Support\Facades\DB;
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
       
        $reset = DB::table('password_reset_tokens')->where('email', $this->email)->first();
        if (!$reset) {
            $this->addError('email', 'Không tìm thấy token đặt lại mật khẩu.');
            return;
        }

        $token = urlencode($reset->token); 


        return redirect()->to("/reset-password/$token?email={$this->email}");
    } else {
        $this->addError('email', 'Gửi email thất bại!');
    }
}


    public function render()
    {
        return view('livewire.client.auth.forgot-password');
    }
}
