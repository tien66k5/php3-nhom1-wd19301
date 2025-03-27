<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('client.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (FacadesAuth::attempt($credentials)) {

            $user = FacadesAuth::user();

           session(['user'=>$user]);

            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->back()->with('error', 'Đăng nhập thất bại!');
    }



    public function logout(Request $request)
{
    FacadesAuth::logout();

    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 
    return redirect()->route('loginForm.index')->with('success', 'Đăng xuất thành công!');
}

    public function registerForm()
    {
        return view('client.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|numeric|digits_between:10,12',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ],[
            'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
            'password_confirmation.required' => ' Nhập lại mật khẩu không để trống',

        ]);

        User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('loginForm.index')->with('success', 'Đăng ký thành công');



    }
}