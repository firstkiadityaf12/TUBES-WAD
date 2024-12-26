<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'tanggal_pemasukan',
        'sumber_pemasukan',
        'jumlah_pemasukan',
        'deskripsi',
        'id_bank',
    ];
    
    public function Akun_Bank()
    {
        return $this->belongsTo(Akun_Bank::class, 'id_bank', 'id');
    }
}
