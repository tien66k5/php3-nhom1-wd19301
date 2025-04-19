<?php
namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Password;

class Auth extends Component
{

    public function loginForm()
    {
        return view('livewire.client.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (FacadesAuth::attempt($credentials)) {
          
            $user = FacadesAuth::user();
            session(['user' => $user]);
            Session::regenerate();

            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');
        }


        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (!Hash::check($request->password, $user->password)) {

                return redirect()->back()->withErrors(['password' => 'Mật khẩu không đúng.']);
            }
        } else {

            return redirect()->back()->withErrors(['email' => 'Email không tồn tại trong hệ thống.']);
        }


        return redirect()->back()->with('error', 'Đăng nhập thất bại!');
    }



    public function logout(Request $request)
    {
        FacadesAuth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }

    public function registerForm()
    {
        return view('livewire.client.register');
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
        ], [
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

        return redirect()->route('login')->with('success', 'Đăng ký thành công');

    }

    public function forgotForm()
    {
        return view('livewire.client.auth.forgot-password');
    }

    public function forgotEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại trong hệ thống',
        ]);


        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {

            $token = $this->getResetToken($request->email);

            if (!$token) {
                return back()->withErrors(['email' => 'Không tìm thấy token đặt lại mật khẩu.']);
            }


            return redirect(url("/reset-password/$token?email={$request->email}"))
                ->with('success', 'Đã gửi liên kết đặt lại mật khẩu đến email của bạn!');
        } else {
            return back()->withErrors(['email' => 'Gửi email thất bại, vui lòng thử lại sau.']);
        }
    }


    private function getResetToken($email)
    {
        $reset = DB::table('password_reset_tokens')->where('email', $email)->first();
        return $reset ? urlencode($reset->token) : null;
    }



    public function resetForm(Request $request, $token)
    {
        return view('livewire.client.auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }


    public function resetPasswordUpdate(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Link đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.']);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Không tìm thấy người dùng với email này.']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect('/loginForm')->with('success', 'Mật khẩu đã được đặt lại thành công!');
    }


}