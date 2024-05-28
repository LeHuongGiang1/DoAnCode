<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\device;
use App\Models\category;
use App\Models\depot;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class deviceController extends Controller
{
    public function index(Request $request){
        $query = device::orderBy('id', 'desc');
        if ($request->has('cate')) {
            $query->where('category_id', $request->cate);
        }
        $devices = $query->paginate(20);

        return view('admin.device.list', compact('devices'));
    }
    public function create(){
        $categories = category::all();
        $depots = depot::all();
        return view('admin.device.create', compact('categories', 'depots'));
    }
    public function store(Request $request){
        $this->validate($request, [
                'category_id' =>'required',
                'depot_id' =>'required',
                'name' =>'required',
                'image' =>'required',
                'configuration' =>'required',
            ]);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name_file = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                if(strcasecmp($extension, 'jpg')||strcasecmp($extension, 'png')||strcasecmp($extension, 'jepg')){
                    $image = Str::random(5) ."_". $name_file;
                    while(file_exists("image/device/" .$image)){
                        $image = Str::random(5) ."_". $name_file;
                    }
                    $file->move('image/device', $image);
                }
            }

            device::create([
                'category_id'=>$request->category_id,
                'depot_id'=>$request->depot_id,
                'name'=>$request->name,
                'image'=>$image,
                'configuration'=>$request->configuration,

            ]);
        return redirect()->route('admin.device.index')->with('success', 'Thêm mới thành công!' );

    }
    public function edit($id){
        $devices = device::find($id);
        $categories = category::all();
        $depots = depot::all();
        return view('admin.device.edit', compact('devices', 'categories', 'depots'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'category_id' =>'required',
            'depot_id' =>'required',
            'name' =>'required',
            'image' =>'required',
            'configuration' =>'required',
        ]
            );
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name_file = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                if(strcasecmp($extension, 'jpg')||strcasecmp($extension, 'png')||strcasecmp($extension, 'jepg')){
                    $image = Str::random(5) ."_". $name_file;
                    while(file_exists("image/device/" .$image)){
                        $image = Str::random(5) ."_". $name_file;
                    }
                    $file->move('image/device', $image);
                }
            }

            $devices = device::find($id);
            $devices->update([
                'category_id'=>$request->category_id,
                'depot_id'=>$request->depot_id,
                'name'=>$request->name,
                'image'=> isset($image) ? $image : $devices->image,
                'configuration'=>$request->configuration,
            ]);

        return redirect()->route('admin.device.index')->with('success', 'Sửa thành công!' );
    }

    public function delete($id){
        device::where('id', $id)->delete();
        return redirect()->route('admin.device.index')->with('success', 'Xóa thành công!');
    }

    public function ajaxAllData(Request $request){

        $str = $request->like ?? '';
        $devices = device::where('name' , 'like' , "%$str%")->take(100)->get()->toArray();
        return response()->json($devices, 200);
    }
}