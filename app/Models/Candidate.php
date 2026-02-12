<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $fillable = ['position_id','nama','vision', 'photo'];

    public function votes() {
        return $this->hasMany(Vote::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
