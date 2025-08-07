<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;
    protected $table ='donates';

    protected $fillable =['id','names','email','amount','period','address','country','program_id','sponsorship_id','message'];

    public function child(){
        return $this->hasMany(Sponsorship::class);
    }
}
