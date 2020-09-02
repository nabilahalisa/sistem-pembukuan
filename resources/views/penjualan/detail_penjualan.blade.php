@extends('layout.main')
@section('title', 'Detail Penjualan')

@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Penjualan</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('dashboard')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('penjualan.index')}}">Penjualan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detail Penjualan</h4>
                        </div>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" value="{{$sale->date}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" value="{{$sale->name}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control form-control" value="{{$sale->phone}}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control form-control" value="{{$sale->product}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" class="form-control form-control" value="{{$sale->store}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Resi</label>
                                        <input type="date" class="form-control form-control" value="{{$sale->date}}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cara Pakai</label>
                                        <input type="date" class="form-control form-control" value="{{$sale->htuse}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Ulasan</label>
                                        <input type="date" class="form-control form-control" value="{{$sale->ulasan}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control form-control" value="{{$sale->ket}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('penjualan.index')}}" class="btn btn-danger">Kembali</a>&nbsp;
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection