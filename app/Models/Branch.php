<?php

namespace App\Models;
use App\Models\Ministry;
use App\Models\Program;
use App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = ['id','name','parent_id','background','phone','email','manager','image','status'];

    public function ministry(){
        return $this->hasMany(Ministry::class, 'branch_id','id');
    }
    public function program(){
        return $this->hasMany(Program::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function member(){
        return $this->hasMany(Member::class,'id');
    }


}
