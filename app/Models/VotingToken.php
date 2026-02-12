<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotingToken extends Model
{
    //
    protected $fillable = ['alumni_id','token','used_at'];

    public function alumni() {
        return $this->belongsTo(Alumni::class);
    }

    public function isUsed() {
        return !is_null($this->used_at);
    }
}
