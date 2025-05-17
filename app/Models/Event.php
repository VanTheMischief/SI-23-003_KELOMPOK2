<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nama_event', 
        'penyelenggara',
        'ketuplak',
        'lokasi',
        'tanggal', 
        'jmlh_max',
        'jmlh_saat_ini',
        'dana_dibutuhkan',
        'dana_terpakai',
    ];
}
