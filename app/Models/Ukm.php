<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    protected $fillable = [
        'nama_ukm',
        'id_ketua',
        'nama_ketua',
        'logo',
        'jmlh_anggota',
    ];

    public function ukm(){
        return $this->hasOne(ukm::class, 'id_ketua');
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'id_ketua');
    }
}
