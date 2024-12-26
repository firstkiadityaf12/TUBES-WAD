<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankaccount extends Model
{
    //
    use HasFactory;
    protected $table = 'akun_banks';
    protected $fillable = [
        'nama_bank',
        'nomor_rekening',
        'nama_pemilik',
        'saldo',
        'tanggal_ditambahkan',
        'tanggal_diubah',
    ];

    // foreign key
    public function transactions()
    {
        return $this->hasMany(transaksi::class, 'id_akun_banks');
    }

    public function pengeluarans()
    {
        return $this->hasMany(Pengeluaran::class, 'id_akun_bank', 'id');
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class, 'id_akun_bank');
    }

    public function pemasukans()
    {

        return $this->hasMany(Pemasukans::class, 'id_akun_bank', 'id');

    }
}
