<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;
use App\Models\devicedetail;
use App\Models\device;
use Illuminate\Support\Facades\DB;


class deviceDetailController extends Controller
{

    public function update(Request $request, $device_id, $department_id){
        $this->validate($request,
            [
                'name' =>'required',
                'manager' =>'required',
                'address' =>'required'
            ]
            );

        devicedetail::where('device_id', 'device_id', $device_id, $department_id)->update([
            'status' =>$request->status,
        ]);
        return redirect()->route('admin.action.department.show')->with('success', 'Sửa thành công!' );

    }
    public function delete($id){
        devicedetail::where('id', $id)->delete();
        return redirect()->route('admin.action.devicedetail.index', $id)->with('success', 'Xóa thành công!' );
    }

    public function listBroken(){
        $devices = DB::table('devicedetail')
        ->join('department', 'department.id', '=', 'devicedetail.department_id')
        ->join('device', 'device.id', '=', 'devicedetail.device_id')
        ->where('devicedetail.status','=', 0)->select('devicedetail.updated_at', 'device.name', 'device.image', 'device.configuration')->get();
        return view('admin.devicedetail.listBroken', [ 'devices' => $devices]);
    }

    public function listFixed(){
        $devices = DB::table('devicedetail')
        ->join('device', 'device.id', '=', 'devicedetail.device_id')
        ->where('devicedetail.status','=', 2)->select('devicedetail.updated_at', 'device.name', 'device.image', 'device.configuration')->get();
        return view('admin.devicedetail.listFixed', [ 'devices' => $devices]);
    }

    public function fixed(){
        try{

            DB::beginTransaction();

            $device = devicedetail::where('devicedetail.status', '=', 0)->first();
            $device->status = 2;
            $device->save();
            DB::commit();
            return redirect()->back()->with('success', 'Thành công!' );


        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }

}