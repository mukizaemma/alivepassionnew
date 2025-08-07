<?php

namespace App\Models;
use App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
