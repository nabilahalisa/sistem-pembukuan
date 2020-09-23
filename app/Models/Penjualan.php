<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penjualan extends Model
{
    protected $table = 'sale';

    protected $fillable = [
        'date', 'name', 'phone', 'product', 'store', 'resi', 'htuse', 'ulasan', 'ro', 'ket'
    ];

    protected $appends = [
        'date_list', 'resi_list', 'htuse_list', 'ulasan_list'
    ];

    public function getDateListAttribute()
    {
        return $this->attributes['date'] ? Carbon::parse($this->attributes['date'])->format('d/m/Y') : null;
    }

    public function getResiListAttribute()
    {
        return $this->attributes['resi'] ? Carbon::parse($this->attributes['resi'])->format('d/m/Y') : null;
    }

    public function getHtuseListAttribute()
    {
        return $this->attributes['htuse'] ? Carbon::parse($this->attributes['htuse'])->format('d/m/Y') : null;
    }

    public function getUlasanListAttribute()
    {
        return $this->attributes['ulasan'] ? Carbon::parse($this->attributes['ulasan'])->format('d/m/Y') : null;
    }
}
