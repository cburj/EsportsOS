<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
        'coach_name',
        'country',
        'twitter',
        'primary_sponsor',
        'seconday_sponsor'
    ];

    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }
}
