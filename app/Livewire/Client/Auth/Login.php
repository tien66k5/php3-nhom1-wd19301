<?php
namespace App\Livewire\Client\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session(['user' => Auth::user()]);
            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');
        }

        $this->addError('email', 'Email hoặc mật khẩu không đúng.');
    }

    public function render()
    {
        return view('livewire.client.auth.login');
    }
}
