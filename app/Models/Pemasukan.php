<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukans';
    protected $fillable = [
        'tanggal_pemasukan',
        'sumber_pemasukan',
        'jumlah_pemasukan',
        'deskripsi',
        'id_akun_bank',
    ];
    
    public function bankaccount()
    {
        return $this->belongsTo(Bankaccount::class, 'id_akun_bank', 'id');
    }
}
