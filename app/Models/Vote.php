<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    protected $fillable = [
        'voting_token_id',
        'position_id',
        'candidate_id'
    ];
}
