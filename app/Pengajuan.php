<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $fillable = [
        'nasabah_id', 'tanggal_pengajuan', 'status_pengajuan', 'tanggal_validasi', 'status_peminjaman', 'keterangan', 'total_nilai'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function detail_pengajuan()
    {
        return $this->hasMany(DetailPengajuan::class, 'pengajuan_id', 'id');
    }

    public function nasabah()
    {
        return $this->belongsTo(\App\Nasabah::class, 'nasabah_id');
    }

    public function nilai()
    {
        return $this->hasMany(\App\Nilai::class);
        // return $this->hasMany(\App\Nilai::class,'nilai','nasabah_id','kriteria_id', 'nilai');
    }
}
