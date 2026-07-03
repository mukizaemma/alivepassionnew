<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table= "news";
    protected $fillable = [
        'title',
        'author',
        'body',
        'slug',
        'image'
    ];

    public function Blogimages()
    {
        return $this->hasMany(Blogimages::class);
    }
}
