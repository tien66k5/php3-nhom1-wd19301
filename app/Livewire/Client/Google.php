<?php
namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class Google extends Component
{
    public function redirectToGoogle()
    {
        return redirect()->to(Socialite::driver('google')->redirect()->getTargetUrl());
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();


            $user = User::where('google_id', $googleUser->id)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'firstname' =>$googleUser->firstname,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'phone' => $googleUser->phone,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt('default_password'),
                ]);
            }
           // dd($googleUser);
            Auth::login($user);

            return redirect()->route('home.index')->with('success', 'Đăng nhập Google thành công!');
        } catch (\Exception $e) {
           // dd($e->getMessage());
            return redirect()->route('loginForm.index')->with('error', 'Đăng nhập Google thất bại!');
        }
        
    }
}
