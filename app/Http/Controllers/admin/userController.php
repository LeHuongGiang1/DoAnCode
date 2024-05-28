<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'name' =>'required',
                'email' => 'required|unique:users|email',
                'password' => 'min:6|max:32|required_with:confirm|same:confirm',
                'confirm' => 'min:6|max:32',
                'is_admin' => 'required'
            ]);

        User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), //c2 Hash::make($request->password)
            'is_admin' => $request->is_admin,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'Thêm mới thành công!' );
    }
    public function edit($id){
        $users = User::find($id);
        return view('admin.user.edit', compact('users'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required',
                'is_admin' => 'required'
            ]);
        $users = User::find($id);
        $data = [
            'name' => $request->name,
            'is_admin' => $request->is_admin
        ];

        // if($request->password ){
        //     $this->validate($request,
        //     [
        //         'password' => 'min:6|max:32|confirmed',
        //     ]);
        //     $data['password'] = Hash::make($request->password);
        // }

        $users->update($data);
        return redirect()->route('admin.user.index', $users->id)->with('success', 'Sửa thành công!');
    }
    public function delete($id){
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index', $id)->with('success', 'Xóa thành công!' );
    }
}