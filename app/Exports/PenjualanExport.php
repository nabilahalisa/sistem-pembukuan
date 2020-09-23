<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromArray;

class PenjualanExport implements FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function array(): array
    {
        $sales = Penjualan::whereIn('id', $this->id)->get();
        $header = [
            "NOMOR", "TANGGAL", "NAMA", "HP", "PRODUK", "STORE", "RESI",
            "CARA PAKAI", "ULASAN", "KETERANGAN"
        ];
        $data[] = $header;
        foreach ($sales  as $index => $sale) {
            $data[] = [
                $index + 1,
                $sale->date,
                $sale->name,
                $sale->phone,
                $sale->product,
                $sale->store,
                $sale->resi,
                $sale->htuse,
                $sale->ulasan,
                $sale->ket,
            ];
        }
        return $data;
    }
}
