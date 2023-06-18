<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyStock extends Model
{
    protected $fillable = ['nama_sales','nama_barang','nama_outlet','jumlah_stok','jumlah_display','visit_datetime'];
}
