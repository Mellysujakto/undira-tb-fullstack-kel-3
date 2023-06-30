<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['kode_barang','nama_barang','stok','harga_barang'];
}
