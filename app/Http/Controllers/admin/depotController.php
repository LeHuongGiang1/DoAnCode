<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\depot;

class depotController extends Controller
{
    public function index(){
        $depots = depot::all();
        return view('admin.action.depot.list', compact('depots'));
    }
    public function create(){
        return view('admin.action.depot.create');
    }
    public function store(Request $request){


        $this->validate($request,
            [
                'name' =>'required',
            ]
            );

        depot::create([
            'name' =>$request->name,
        ]);
        return redirect()->route('admin.action.depot.index')->with('success', 'Thêm mới thành công!' );
    }
    public function edit($id){
        $depots = depot::find($id);
        return view('admin.action.depot.edit', compact('depots'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required',
            ]
            );

        depot::where('id', $id)->update([
            'name' =>$request->name,

        ]);
        return redirect()->route('admin.action.depot.index', $id)->with('success', 'Sửa thành công!' );

    }
    public function delete($id){
        depot::where('id', $id)->delete();
        return redirect()->route('admin.action.depot.index', $id)->with('success', 'Xóa thành công!' );
    }
}
