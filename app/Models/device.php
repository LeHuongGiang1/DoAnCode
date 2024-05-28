<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;
    protected $table = 'device';
    protected $fillable = [
        'category_id',
        'depot_id',
        'name',
        'configuration',
        'image'
    ];

    public function category(){
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    
    public function depot(){
        return $this->belongsTo(depot::class, 'depot_id', 'id');
    }
    public function devicedetail(){
        return $this->hasMany(devicedetail::class, 'device_id', 'id');
    }
    public function warranty(){
        return $this->hasMany(warranty::class, 'device_id', 'id');
    }
    
    public function departments(){ 
        return $this->belongsToMany(department::class , 'devicedetail' , 'device_id' , 'department_id');
    }

    public function imageUrl(){
        return '/image/device/' .$this->image;
    }
}
