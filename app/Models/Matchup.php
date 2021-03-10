<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
    use HasFactory;

    protected $fillable = [
        'team1_id',
        'team2_id',
        'child1_id',
        'child2_id',
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

    public function child1()
    {
        return $this->belongsTo(('App\Models\Matchup'));
    }

    
    public function child2()
    {
        return $this->belongsTo(('App\Models\Matchup'));
    }
}
