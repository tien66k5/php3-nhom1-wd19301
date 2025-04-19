<?php

namespace App\Livewire\Client\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');
    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);
    
        
        $record = DB::table('password_reset_tokens')
            ->where('email', $this->email)
            ->first();
    
        
        if (!$record || !Hash::check($this->token, $record->token)) {
            $this->addError('email', 'Liên kết không hợp lệ hoặc đã hết hạn.');
            return;
        }
    

        $user = User::where('email', $this->email)->first();
        $user->update(['password' => Hash::make($this->password)]);
    

        DB::table('password_reset_tokens')->where('email', $this->email)->delete();
    
        session()->flash('success', 'Mật khẩu đã được cập nhật!');
        return redirect()->route('login');
    }
    

    public function render()
    {
        return view('livewire.client.auth.reset-password');
    }
}


