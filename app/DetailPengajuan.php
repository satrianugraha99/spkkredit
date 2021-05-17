<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengajuan extends Model
{
    protected $table = 'detail_pengajuan';
    protected $fillable = [
        'pengajuan_id', 'kriteria_id', 'nilai', 'ket_nilai'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function kriteria()
    {
        return $this->belongsTo(\App\Kriteria::class, 'kriteria_id');
    }

    // public function kriteria()
    // {
    //     return $this->hasOne(Kriteria::class);
    // }
}
