<?php
namespace App\Livewire\Client;

use Livewire\Component;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Google extends Component
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Xử lý callback từ Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google') ->user();
            dd($googleUser);
            $user = User::where('google_id', $googleUser->id)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('default_password'),
                ]);
            }

            FacadesAuth::login($user);

            return redirect()->route('home.index')->with('success', 'Đăng nhập Google thành công!');
        } 
        catch (\Exception $e) {
            dd($e->getMessage()); // Hiển thị chi tiết lỗi
        }
        /* catch (\Exception $e) {
            return redirect()->route('loginForm.index')->with('error', 'Đăng nhập Google thất bại!');
        } */
    }
}
