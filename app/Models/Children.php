<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Children extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name', 'code' ,'role','id_pembimbing',
    ];

    public function pembimbing(){
        return $this->hasOne(Pembimbing::class, 'id','id_pembimbing');
    }
}
