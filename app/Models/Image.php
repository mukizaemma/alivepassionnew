<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table= "images";
    protected $fillable = [
        'program_id',
        'caption',
        'image'
    ];

    public function program(){
        return $this->belongsTo(Program::class);
    }
}
