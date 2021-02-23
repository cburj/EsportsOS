<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisputeMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'visible',
        'matchup_id',
        'user_id'
    ];

    public function matchupID()
    {
        return $this->belongsTo('App\Models\Matchup');
    }

    public function userID()
    {
        return $this->belongsTo('App\Models\User');
    }
}
