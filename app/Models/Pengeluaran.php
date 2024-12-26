<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluarans';

    protected $fillable = [
        'tanggal_pengeluaran',
        'sumber_pengeluaran',
        'jumlah_pengeluaran',
        'deskripsi',
        'id_akun_bank', 
    ];

    public function Akun_Bank()
    {
        return $this->belongsTo(Akun_Bank::class, 'id_akun_bank');
    }

}
