<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotingSetting extends Model
{
    //
    protected $fillable = ['start_at','end_at','is_active'];
}
