<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\device;
use App\Models\User;
use App\Models\devicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departmentController extends Controller
{
    // status =0 hỏng
    // status =1 dùng bthg
    // status =2 da sửa chữa xong
    public function index(){
        $departments = department::all();
        return view('admin.action.department.list', compact('departments'));
    }
    public function create(){
        return view('admin.action.department.create');
    }

    function show($id){
        $department = department::find($id);
        $devices = $department->devices()->get();
        return view('admin.action.department.show', ['department'=>$department, 'devices'=> $devices]);
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'name' =>'required',
                'manager' =>'required',
                'address' =>'required'
            ]
            );

        department::create([
            'name' =>$request->name,
            'manager' =>$request->manager,
            'address' =>$request->address,
        ]);
        return redirect()->route('admin.action.department.index')->with('success', 'Thêm mới thành công!' );
    }
    public function edit($id){
        $departments = department::find($id);
        return view('admin.action.department.edit', compact('departments'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required',
                'manager' =>'required',
                'address' =>'required'
            ]
            );

        department::where('id', $id)->update([
            'name' =>$request->name,
            'manager' =>$request->manager,
            'address' =>$request->address,

        ]);
        return redirect()->route('admin.action.department.index', $id)->with('success', 'Sửa thành công!' );
    }
    public function delete($id){
        $device = DB::table('devicedetail')->join('department', 'department.id', '=', 'devicedetail.department_id')->where('devicedetail.department_id', '=', $id)->count();
        if ($device > 0){
            return redirect()->route('admin.action.department.index')->with('success', 'Không thể xóa Phòng ban vẫn còn thiết bị!');
        } else {
            department::where('id', $id)->delete();
            return redirect()->route('admin.action.department.index', $id)->with('success', 'Xóa thành công!' );
        }

    }

    // function formAddDevice($id){
    //     return view('admin.action.department.add_device', [
    //         'id' => $id
    //     ]);
    // }
    function formAddDevice(){
        $devices = device::all();
        $departments = department::all();
        $users = User::all();

        $array = [];
        foreach ($departments as $key => $value) {
            $array[$key] = $value;
        }

        return view('admin.action.department.add_device', compact('devices', 'departments', 'users'));
    }

    // function addDevice(Request $request, $id){
    //     try{
    //         $device_id = $request->device_id;
    //         // $data = $request->only(['department_used','amount_used','status']);
    //         $data = ['department_used' => 1,'amount_used' => 1,'status' => 1];
    //         DB::beginTransaction();
    //         $department = department::find($id);
    //         // lấy all  $department->devices()->where()->get();

    //         $department->devices()->detach([$device_id]);
    //         $department->devices()->attach($device_id, $data);
    //         DB::commit();
    //         return redirect()->route('admin.action.department.listDepartment')->with('success', 'Created successfully!' );
    //     }catch(\Exception $ex){
    //         dd($ex);
    //         DB::rollBack();
    //         return back()->with('notification_error', 'Lỗi !!! ');
    //     }
    // }

    function addDevice(Request $request){
        try{
            $device_id = $request->device_id;
            DB::beginTransaction();
           $a = devicedetail::create(
                [
                    'department_id' => $request->department, 
                    'device_id' => $device_id, 
                    'user_id' => (int)$request->userId,
                    'status'  => 1
                ]);
            DB::commit();
            return redirect()->route('admin.department.listDepartment')->with('success', 'Thêm thiết bị thành công!' );
        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return back()->with('notification_error', 'Lỗi !!! ');
        }
    }

    public function listDepartment(){
        $departments = department::all();
        return view('admin.action.department.listDepartment', compact('departments'));
    }

    /// $item = devicedetail::where(['deperr...' => $deparment , 'device...' => $id])->first();
    // $item->... = giá trị mới;
    // $item->save();

    public function deleteDevice($id, $deparment){
        try{
            DB::beginTransaction();
            $department = department::find($deparment);

            $department->devices()->detach([$id]);
            DB::commit();
            return redirect()->back()->with('success', 'Trả thành công' );
        }catch(\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }

    public function updateStatusDevice($id, $department){
        try{
            DB::beginTransaction();
            $item = devicedetail::where(['department_id' => $department, 'device_id' => $id])->first();
            $item->status = 0;
            // $item->amount_used == $item->amount_used - 1;
            $item->save();
            DB::commit();
            return redirect()->back()->with('success', 'Upleted successfully!' );
        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }

    public function fixed($id, $department){
        try{
            DB::beginTransaction();
            $item = devicedetail::where(['department_id' => $department, 'device_id' => $id])->first();
            $item->status = 2;
            $item->save();
            DB::commit();
            return redirect()->back()->with('success', 'Upleted successfully!' );
        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }
}