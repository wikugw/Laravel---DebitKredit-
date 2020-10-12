<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $fillable = [
        'nama',
        'unique_id',
        'saldo'
    ];

    public function cart()
    {
        return $this->hasMany('App\Transaksi');
    }
}
