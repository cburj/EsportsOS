<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    public function team1()
    {
        return $this->belongsTo('App\Models\Team');
    }
    
    public function team2()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
