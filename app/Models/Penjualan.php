<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'sale';

    protected $fillable = [
        'date', 'name', 'phone', 'product', 'store', 'resi', 'htuse', 'ulasan', 'ro', 'ket'
    ];
}
