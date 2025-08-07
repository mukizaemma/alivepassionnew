<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table= "programs";
    protected $fillable = [
        'title',
        'description',
        'slug',
        'image'
    ];

    public function campains(){
        return $this->hasMany(Campain::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
