<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    //
    protected $table = 'nasabah';
    protected $fillable = [
        'user_id', 'noKtp', 'nama', 'alamat', 'noTelp', 'jenisKelamin'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function nilai()
    {
        return $this->hasMany(\App\Nilai::class);
        // return $this->hasMany(\App\Nilai::class,'nilai','nasabah_id','kriteria_id', 'nilai');
    }

    public function crip()
    {
        return $this->belongsToMany(\App\Nilai::class, 'nilai', 'nasabah_id', 'kriteria_id');
    }

    // public function pengajuan()
    // {
    //     return $this->hasMany(Pengajuan::class, 'nasabah_id', 'id');
    // }

    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class, 'nasabah_id', 'id');
    }
}
