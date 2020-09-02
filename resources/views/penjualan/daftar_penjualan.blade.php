@extends('layout.main')
@section('title', 'Daftar Penjualan')


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
                    <a href="#">Daftar Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Penjualan</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('penjualan.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover cell-border" style="width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Tanggal</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Telephone</th>
                                        <th rowspan="2">Produk</th>
                                        <th rowspan="2">Toko</th>
                                        <th colspan="3" class="text-center">Follow Up CS</th>
                                        <!-- <th rowspan="2">Ket</th> -->
                                        <th rowspan="2" style="width: 5%">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Resi</th>
                                        <th>C. Pakai</th>
                                        <th>Ulasan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Telephone</th>
                                        <th>Produk</th>
                                        <th>Toko</th>
                                        <th>Resi</th>
                                        <th>C. Pakai</th>
                                        <th>Ulasan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{$sale->date}}</td>
                                        <td>{{$sale->name}}</td>
                                        <td>{{$sale->phone}}</td>
                                        <td>{{$sale->product}}</td>
                                        <td>{{$sale->store}}</td>
                                        <td>{{$sale->resi}}</td>
                                        <td>{{$sale->htuse}}</td>
                                        <td>{{$sale->ulasan}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('penjualan.detail', $sale->id)}}">Detail</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('penjualan.form.edit', $sale->id)}}">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$sale->id}}">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('modal')
<!-- Hapus Modal -->
@foreach ($sales as $sale)
<div class="modal fade" id="hapusModal{{$sale->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data Driver</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('penjualan.hapus', $sale->id)}}" method="POST">
                @method ('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan nama {{$sale->name}} ?</p>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection


@section('script')
<script>
    $(document).ready(function() {
        $('#multi-filter-select').DataTable({
            "pageLength": 10,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    });
</script>
@endsection