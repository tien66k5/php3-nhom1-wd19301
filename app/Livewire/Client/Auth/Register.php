<?php

namespace App\Livewire\Client\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $firstname, $lastname, $email, $phone, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|numeric|digits_between:10,12',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    public function render()
    {
        return view('livewire.client.auth.register');
    }
}
