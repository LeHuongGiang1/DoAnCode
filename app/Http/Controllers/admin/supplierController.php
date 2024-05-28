<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function index(){
        $suppliers = supplier::all();
        return view('admin.action.supplier.list', compact('suppliers'));
    }
    public function create(){
        return view('admin.action.supplier.create');
    }
    public function store(Request $request){


        $this->validate($request,
            [
                'name' =>'required',
            ]
            );

        supplier::create([
            'name' =>$request->name,

        ]);
        return redirect()->route('admin.action.supplier.index')->with('success', 'Thêm mới thành công!' );
    }
    public function edit($id){
        $suppliers = supplier::find($id);
        return view('admin.action.supplier.edit', compact('suppliers'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required',
            ]
            );

        supplier::where('id', $id)->update([
            'name' =>$request->name,

        ]);
        return redirect()->route('admin.action.supplier.index', $id)->with('success', 'Sửa thành công!' );

    }
    public function delete($id){
        supplier::where('id', $id)->delete();
        return redirect()->route('admin.action.supplier.index', $id)->with('success', 'Xóa thành công!' );
    }
}