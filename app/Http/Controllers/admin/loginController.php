<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;

class loginController extends Controller
{
    public function login(){
        return view('admin.login.index');
    }
    public function resetPasswordForm(){
        return view('admin.login.register');
    }

    public function resetPassword(){
        return redirect()->route('admin.login.index')->with('success', 'Gửi yêu cầu thành công');
    }

    public function checkLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.home.index');
        }
        else
            return redirect()->route('admin.login.index')->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
/// su dung laravel https://laravel.com/docs/7.x/authentication de login
    public function profile(){
        return view('admin.login.profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request,
            [
                'name' =>'required',
                'phone' => 'required',
                'address' => 'required'
            ]);
        $users = Auth::user();
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $users->update($data);
        return redirect()->route('admin.login.profile')->with('success', 'Cập nhật thành công');
    }

    public function showFormRegister(){
        return view('admin.login.register');
    }

    public function register(Request $request){
        $this->validate($request,
            [
                'name' =>'required',
                'email' => 'required|unique:users|email',
                'password' => 'min:6|max:32|required_with:confirm|same:confirm',
                'confirm' => 'min:6|max:32',
            ]);

        User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => -1,
        ]);
        return redirect()->route('admin.login.index')->with('success', 'Đăng ký thành công' );
    }
}