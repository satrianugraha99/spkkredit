<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $table = 'detail_pengajuan';
    protected $fillable = ['nasabah_id', 'pengajuan_id', 'kriteria_id', 'nilai'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;

    public function kriteria()
    {
        return $this->belongsTo(\App\Kriteria::class, 'kriteria_id');
    }
    public function nasabah()
    {
        return $this->belongsTo(\App\Nasabah::class, 'nasabah_id');
    }
    public function pengajuan()
    {
        return $this->belongsTo(\App\Nasabah::class, 'nasabah_id');
    }
}
