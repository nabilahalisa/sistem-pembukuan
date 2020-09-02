@extends('layout.main')
@section('title', 'Edit Penjualan')

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
                    <a href="#">Edit Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Penjualan</h4>
                        </div>
                    </div>
                    <form id="formPenjualanEdit" action="{{route('penjualan.edit', $sale->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- <input type="hidden" id="id" name="id" value="{{$sale->id}}"> -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" id="tglEdit" name="tglEdit" value="{{$sale->date}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="nameEdit" name="nameEdit" value="{{$sale->name}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control form-control" id="phoneEdit" name="phoneEdit" value="{{$sale->phone}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control form-control" id="productEdit" name="productEdit" value="{{$sale->product}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" class="form-control form-control" id="storeEdit" name="storeEdit" value="{{$sale->store}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Resi</label>
                                        <input type="date" class="form-control form-control" id="resiEdit" name="resiEdit" value="{{$sale->date}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cara Pakai</label>
                                        <input type="date" class="form-control form-control" id="htuseEdit" name="htuseEdit" value="{{$sale->htuse}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ulasan</label>
                                        <input type="date" class="form-control form-control" id="ulasanEdit" name="ulasanEdit" value="{{$sale->ulasan}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control form-control" id="ketEdit" name="ketEdit" value="{{$sale->ket}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('penjualan.index')}}" class="btn btn-danger">Batal</a>&nbsp;
                            <button type="reset" class="btn btn-info">Reset</button>&nbsp;
                            <button type="submit" class="btn btn-success" id="submitData">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>
<script>
    // $(document).ready(function() {
    //     var swalLoading = function() {
    //         swal.fire({
    //             title: "Loading....",
    //             text: "Mohon Tunggu Sebentar",
    //             allowOutsideClick: false,
    //             onOpen: function() {
    //                 Swal.showLoading()
    //             }
    //         })
    //     }


    //     $('#submitData').click(function(e) {
    //         e.preventDefault();
    //         swalLoading();

    //         $.ajax({
    //             data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 'tglEdit': $('#tglEdit').val(),
    //                 'nameEdit': $('#nameEdit').val(),
    //                 'phoneEdit': $('#phoneEdit').val(),
    //                 'productEdit': $('#productEdit').val(),
    //                 'storeEdit': $('#storeEdit').val(),
    //                 'resiEdit': $('#resiEdit').val(),
    //                 'htuseEdit': $('#htuseEdit').val(),
    //                 'ulasanEdit': $('#ulasanEdit').val(),
    //                 'roEdit': $('#roEdit').val(),
    //                 'ketEdit': $('#ketEdit').val()
    //             },

    //             url: "{!!  route('penjualan.edit',['penjualan'=>$sale->id]) !!}",
    //             type: "POST",
    //             dataType: 'json',
    //             success: function(data) {
    //                 swal.close();
    //                 swalSuccess('Edit data penjualan berhasil');
    //                 window.location.href = "{!!route('penjualan.index')!!}";
    //             },
    //             error: function(data) {
    //                 swalError('Error, tidak dapat menambah data');

    //             }
    //         });

    //     });


    // });
</script>
@endsection