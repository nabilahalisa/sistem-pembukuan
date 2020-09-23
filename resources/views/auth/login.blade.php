@extends('layout.user')
@section('title', 'Login Page')

@section('content')
<!-- Container -->
<div class="content">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 align-self-center">
        <div class="card card-dark bg-primary-gradient mt-5">
            <div class="card-body bubble-shadow">
                <div class="pricing-header">
                    <h2 class="fw-bold">LOGIN</h2>
                    <span class="sub-title">Sistem Informasi</span><br>
                    <span class="sub-title">Pembukuan Penjualan</span>
                </div>
            </div>
            <div class="card-pricing2 mt-1">
                <div class="card-body">
                    <div class="col-md-12">
                        <br>
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control" id="name" name="name" placeholder="Username" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-border btn-lg w-100 fw-bold mb-3"><i class="fas fa-key"> Login</i></button>
                            </div>
                        </form>
                        <!-- <label>Belum punya akun ? <a href="{{route('register')}}">Daftar disini</a></label> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
@endsection