<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    protected $fillable = [
        'team1_id',
        'team2_id',
        'child_match_id',
        'date_time',
        'server_ip'
    ];

    public function team1()
    {
        return $this->belongsTo('App\Models\Team');
    }
    
    public function team2()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
