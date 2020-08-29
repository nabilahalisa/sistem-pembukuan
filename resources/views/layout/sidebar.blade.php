<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('/assets/img/user.png')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a aria-expanded="true">
                        <span>
                            <span class="user-level">
                                <h4>Administrator</h4>
                            </span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{set_active('dashboard')}}">
                    <a href="{{route('dashboard')}}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{set_active(['penjualan.index','penjualan.form.tambah'])}}">
                    <a data-toggle="collapse" href="#penjualan">
                        <i class="fas fa-chart-bar"></i>
                        <p>Penjualan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['penjualan.index','penjualan.form.tambah'])}}" id="penjualan">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('penjualan.index')}}">
                                <a href="{{route('penjualan.index')}}">
                                    <span class="sub-item">Daftar Penjualan</span>
                                </a>
                            </li>
                            <li class="{{set_active('penjualan.form.tambah')}}">
                                <a href="{{route('penjualan.form.tambah')}}">
                                    <span class=" sub-item">Tambah Penjualan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>