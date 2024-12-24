<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiKeuangan extends Model
{
    protected $table = 'transaksi_keuangan';

    protected $fillable = [
        'tanggal_transaksi',
        'kategori',
        'deskripsi',
        'jumlah',
        'metode_bayar',
        'id_akun_bank',
        'status',
    ];
}
