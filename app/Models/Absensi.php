<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'children_id', 'pembimbing_id', 'video','image','sunday_date', 
    ];

    public function children(){
        return $this->hasOne(Children::class, 'id','children_id');
    }

    public function pembimbing(){
        return $this->hasOne(Pembimbing::class, 'id','pembimbing_id');
    }
}
