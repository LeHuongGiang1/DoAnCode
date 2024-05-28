<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depot extends Model
{
    use HasFactory;
    protected $table = 'depot';
    protected $fillable = [
        'name',
    ];
    public function device(){
        return $this->hasMany(device::class, 'device_id', 'id');
    }
}
