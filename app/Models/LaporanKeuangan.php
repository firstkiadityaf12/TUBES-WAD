<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporanKeuangan extends Model
{
    use HasFactory;
    protected $table = 'laporan_keuangans';
    protected $fillable = [
        'total_pemasukan',
        'periode_laporan', 
        'total_pengeluaran',
        'saldo_akhir',
        'catatan',
        'tanggal_pembuatan',
        'tanggal_diubah',
    ];
    protected $primaryKey = 'id';
    public function transaksiKeuangan()
    {
        return $this->hasMany(TransaksiKeuangan::class, 'id_laporan', 'id_laporan');
    }
    public $timestamps = true;
    

    protected $dates = ['tanggal_pembuatan','tanggal_diubah'];
}
