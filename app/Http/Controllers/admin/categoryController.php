<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\device;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class categoryController extends Controller
{
    public function index(){
        $devices = device::all();
        $categories = category::with('device')->get();
        return view('admin.category.list', compact('devices','categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'name' =>'required'
            ]
            );


        category::create([
            'name' =>$request->name,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Thêm mới thành công!' );
    }
    public function edit($id){
        $categories = category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(Request $request, $id){

        $this->validate($request,
            [
                'name' =>'required'
            ]
            );

        //c1 tim r update
        // $categories = category::find($id);
        // $categories->update([
        //     'name' =>$request->name,
        //     'slug' => $slug
        // ]);

        //c2 update truc tiep
        category::where('id', $id)->update([
            'name' =>$request->name,
        ]);
        return redirect()->route('admin.category.index', $id)->with('success', 'Sửa thành công!' );
    }
    public function delete($id){
        $device = DB::table('device')->join('category', 'category.id', '=', 'device.category_id')->where('device.category_id', '=', $id)->count();
        if ($device > 0){
            return redirect()->route('admin.category.index')->with('success', 'Không thể xóa danh mục vẫn còn thiết bị!');
        } else {
            category::where('id', $id)->delete();
            return redirect()->route('admin.category.index')->with('success', 'Xóa thành công!');
        }
    }
}