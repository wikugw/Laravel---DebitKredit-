<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'saldo_id',
        'nominal',
        'jenis',
        'tanggal'
    ];

    public function saldo()
    {
        return $this->belongsTo('AppSaldo');
    }
}
