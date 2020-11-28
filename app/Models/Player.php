<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'full_name',
        'country',
        'twitter',
        'discord',
        'team_id',
        'user_id'
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
