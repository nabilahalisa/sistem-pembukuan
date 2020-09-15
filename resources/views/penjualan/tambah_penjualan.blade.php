@extends('layout.main')
@section('title', 'Tambah Penjualan')

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
                    <a href="#">Tambah Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Penjualan</h4>
                        </div>
                    </div>
                    <form id="formPenjualan" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" id="tgl" name="tgl" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control" id="product" name="product" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" class="form-control" id="store" name="store" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Resi</label>
                                        <input type="date" class="form-control" id="resi" name="resi" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cara Pakai</label>
                                        <input type="date" class="form-control" id="htuse" name="htuse" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ulasan</label>
                                        <input type="date" class="form-control" id="ulasan" name="ulasan">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" id="ket" name="ket">
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
    $(document).ready(function() {
        var swalLoading = function() {
            swal.fire({
                title: "Loading....",
                text: "Mohon Tunggu Sebentar",
                allowOutsideClick: false,
                onOpen: function() {
                    Swal.showLoading()
                }
            })
        }

        $('#submitData').click(function(e) {
            e.preventDefault();
            swalLoading();

            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    'tgl': $('#tgl').val(),
                    'name': $('#name').val(),
                    'phone': $('#phone').val(),
                    'product': $('#product').val(),
                    'store': $('#store').val(),
                    'resi': $('#resi').val(),
                    'htuse': $('#htuse').val(),
                    'ulasan': $('#ulasan').val(),
                    'ket': $('#ket').val()
                },
                url: "{!!  route('penjualan.tambah') !!}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    swal.close();
                    swalSuccess('Tambah data penjualan berhasil');
                    window.location.href = "{!!route('penjualan.index')!!}";
                },
                error: function(data) {
                    swalError('Error, tidak dapat menambah data');

                }
            });

        });


    });
</script>
@endsection