<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campain extends Model
{
    use HasFactory;
    protected $table = 'campains';
    protected $fillable = ['program_id','title','website','sammary','description','goal','raised','image','youtubeimg','slug'];

    public function program(){
        return $this->belongsTo(Program::class);
    }
    
}
