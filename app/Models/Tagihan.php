<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_tagihan', 'tanggal_jatuh_tempo', 'jumlah_tagihan', 'status', 'catatan', 'id_akun_bank', 'created_at', 'updated_at'];
}
