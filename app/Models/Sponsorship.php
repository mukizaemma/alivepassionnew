<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;
    protected $table ='sponsorships';

    protected $fillable =['id','names','age','sex','contact','aphone'];

    public function Child(){
        return $this->hasMany(Donate::class);
    }
}
