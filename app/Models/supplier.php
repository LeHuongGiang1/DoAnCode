<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = [
        'name',
    ];

    public function warranty(){
        return $this->hasMany(warranty::class, 'warranty_id', 'id');
    }
}
