<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\devicedetail;
use App\Models\device;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $categories = category::all();
        $device = device::all();
        $deviceActive = devicedetail::where('status', 1)->get();
        $deviceBroken = devicedetail::where('status', 0)->get();
        $deviceFixed = devicedetail::where('status', 2)->get();
        return view('admin.home.index', compact('categories', 'device', 'deviceActive', 'deviceBroken', 'deviceFixed'));
    }
}