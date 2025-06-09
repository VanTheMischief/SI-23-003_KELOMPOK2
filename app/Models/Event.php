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
        'foto_hasil'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')->withTimestamps();
    }      
}

