<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Penjualan::all();
        return view('penjualan/daftar_penjualan', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan/tambah_penjualan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'date' => $request->input('tgl'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'product' => $request->input('product'),
            'store' => $request->input('store'),
            'resi' => $request->input('resi'),
            'htuse' => $request->input('htuse'),
            'ulasan' => $request->input('ulasan'),
            'ket' => $request->input('ket')
        ];

        Penjualan::create($data);

        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Penjualan::find($id);

        return view('penjualan/detail_penjualan', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Penjualan::find($id);

        return view('penjualan/edit_penjualan', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $id = $request->input('id');
        $sale = Penjualan::find($id);

        $sale->date = $request->input('tglEdit');
        $sale->name = $request->input('nameEdit');
        $sale->phone = $request->input('phoneEdit');
        $sale->product = $request->input('productEdit');
        $sale->store = $request->input('storeEdit');
        $sale->resi = $request->input('resiEdit');
        $sale->htuse = $request->input('htuseEdit');
        $sale->ulasan = $request->input('ulasanEdit');
        $sale->ket = $request->input('ketEdit');

        $sale->save();

        // return response()->json('success');

        return redirect()->route('penjualan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Penjualan::find($id);

        $sale->delete();

        return redirect()->route('penjualan.index');
    }
}
