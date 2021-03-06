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
                            <a class="btn btn-primary btn-round btn-border ml-auto" type="button" onclick="convert()">
                                <i class="fa fa-file-export"></i>
                                Export
                            </a>&nbsp;&nbsp;
                            <a class="btn btn-primary btn-round" href="{{route('penjualan.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarTable" class="display table table-striped table-hover cell-border" style="width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="width: 10%">
                                            <input type="checkbox" id="checkAll" name="checkAll" onclick="select_all()"> Pilih Semua
                                        </th>
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
                                        <!-- <td>
                                            <b>
                                                <p id="textSelected" name="textSelected"></p>
                                            </b>
                                        </td> -->
                                        <td></td>
                                        <!-- <th></th> -->
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
                                        <td><input type="checkbox" id="check" name="check" value="{{$sale->id}}" onclick="select()"></td>
                                        <td>{{$sale->date_list}}</td>
                                        <td>{{$sale->name}}</td>
                                        <td>{{$sale->phone}}</td>
                                        <td>{{$sale->product}}</td>
                                        <td>{{@$sale->store??'-'}}</td>
                                        <td>{{@$sale->resi_list??'-'}}</td>
                                        <td>{{@$sale->htuse_list??'-'}}</td>
                                        <td>{{@$sale->ulasan_list??'-'}}</td>
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
        $('#daftarTable tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        var table = $('#daftarTable').DataTable();

        table.columns().every(function() {
            var dataTableColumn = this;
            var searchTextBoxes = $(this.footer()).find('input');
            searchTextBoxes.on('keyup change', function() {
                dataTableColumn.search(this.value).draw();
            });
            searchTextBoxes.on('click', function(e) {
                e.stopPropagation();
            });
        });

        // var numberOfChecked = $('input:checkbox:checked').length;

        // $('#textSelected').text(numberOfChecked + ' Data Dipilih');

    });

    function select_all() {
        var check = document.getElementById("checkAll");

        if (check.checked == true) {
            $("input:checkbox[name='check']").attr("checked", true);
        } else {
            $('input:checkbox').removeAttr('checked');
        }

        // var numberOfChecked = $('input:checkbox:checked').length;

        // $('#textSelected').text(numberOfChecked + ' Data Dipilih');
    }

    function convert() {
        var id_data = [];

        $.each($("input[name='check']:checked"), function() {
            id_data[id_data.length] = $(this).val();
        });

        window.location.href = "/penjualan/convert?id=" + id_data;
        console.log(id_data);
    }
</script>
@endsection