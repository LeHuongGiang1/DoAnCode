<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $table = 'department';
    protected $fillable = [
        'name',
        'manager',
        'address',
    ];

    public function devicedetail(){
        return $this->hasMany(devicedetail::class, 'devicedetail_id', 'id');
    }

    public function devices(){ 
        return $this->belongsToMany(device::class , 'devicedetail' , 'department_id' , 'device_id');
    }
    
}
