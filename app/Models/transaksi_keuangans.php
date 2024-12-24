<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function akunBank(): BelongsTo
    {
        return $this->belongsTo(AkunBank::class, 'id_akun_bank', 'id');
    }

    public function laporanKeuangan(): HasMany
    {
        return $this->hasMany(LaporanKeuangan::class, 'transaksi_id', 'id');
    }
}
