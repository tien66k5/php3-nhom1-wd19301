<?php
namespace App\Livewire\Client;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserComponent extends Component
{
    public function render(){
       
        return view('livewire.client.MyAccount' , [
            'user'=>Auth::user()
        ] );
    }

    public function updateProfile(Request $request)
{
    $user = User::find(Auth::id());

    
    $request->validate([
        'name' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'phone' => 'required|numeric|digits_between:10,12',
        'password' => 'nullable|string|min:8|confirmed',
        'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:4000', 
    ], [
        'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
        'avatar.image' => 'Vui lòng chọn một tệp hình ảnh hợp lệ cho avatar.',
        'avatar.mimes' => 'Avatar phải có định dạng jpeg, jpg, png, gif, hoặc svg.',
        'avatar.max' => 'Kích thước avatar không được vượt quá 4MB.',
    ]);

    
    if ($request->hasFile('avatar')) {
        try {
            
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                unlink(storage_path('app/public/' . $user->avatar));
            }


            $avatarPath = $request->file('avatar')->store('uploads', 'public');

            // Cập nhật avatar mới
            $user->avatar = $avatarPath;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tải ảnh lên: ' . $e->getMessage());
        }
    }


    $user->name = $request->name;
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->phone = $request->phone;


    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }


    $user-> save();

    return redirect()->route('Account.index')->with('success', 'Cập nhật thông tin thành công!');
}

}
