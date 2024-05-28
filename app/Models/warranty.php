<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warranty extends Model
{
    use HasFactory;
    protected $table = 'totaldevice';
    protected $fillable = [
        'device_id',
        'supplier_id',
        'warranty_status',
    ];
    public function device(){
        return $this->belongsTo(device::class, 'device_id', 'id');
    }
    public function supplier(){
        return $this->belongsTo(supplier::class, 'supplier_id', 'id');
    }
}
