<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable =['id','branch_id',''];

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
}
