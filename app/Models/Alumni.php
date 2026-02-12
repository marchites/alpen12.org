<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    //
    protected $table = 'alumnis';
    protected $fillable = [
        'nama',
        'tahun_lulus',
        'jurusan',
        'pekerjaan',
        'no_hp',
        'email',
        'domisili'
    ];

    public function votingToken() {
        return $this->hasOne(VotingToken::class);
    }
}
