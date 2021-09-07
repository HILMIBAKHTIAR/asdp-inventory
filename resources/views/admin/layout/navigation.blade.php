<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #252525">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="" style="margin-top: 40px; margin-bottom: 40px;">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{url('backend/img/asdp.svg')}}" alt="" style="width: 100%;">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">asdp</div> --}}
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    
    <li class="nav-item active ">
        <a class="nav-link" href="{{url('/admin')}}">
            <i style="color: #e64614" class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dasboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

    
    @hasanyrole('admin|umum')
    
    <!-- Heading Umum -->
    <div class="sidebar-heading">
        Umum
    </div>

    <!--Nav pengadaan -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengadaan" aria-expanded="true" aria-controls="pengadaan">
            <i style="color: #e64614" class="fas fa-fw fa fa-book"></i>
            <span>Pengadaan</span>
        </a>

        <div id="pengadaan" class="collapse" aria-labelledby="pengadaann" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengadaan:</h6>
                @can('umum-create')
                <a class="collapse-item" href="{{route('sp2bj.create')}}">Sppbj</a>
                @endcan
                @can('umum-list')
                <a class="collapse-item" href="{{route('surat.index')}}">Sppbj Manual</a>
                @endcan
                <a class="collapse-item" href="">Pembelian Dengan Pesanan</a>
                <a class="collapse-item" href="">Penunjukan Langsung</a>
                <a class="collapse-item" href="">Lelang Pemilihan Langsung</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @hasanyrole('admin|umum')
    <!--Nav pemeliharaan -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pemeliharaan" aria-expanded="true" aria-controls="pemeliharaan">
            <i style="color: #e64614" class="fas fa-fw fa fa-toolbox"></i>
            <span>Pemeliharaan</span>
        </a>

        <div id="pemeliharaan" class="collapse" aria-labelledby="pemeliharaann" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pemeliharaan:</h6>
                <a class="collapse-item" href="">Pemeliharaan Kendaran</a>
                <a class="collapse-item" href="">Rekap Pemeliharaan</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @hasanyrole('admin|umum')
    <!--Nav aset -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#aset" aria-expanded="true" aria-controls="aset">
            <i style="color: #e64614" class="fas fa-fw fa fa-table"></i>
            <span>Aset</span>
        </a>

        <div id="aset" class="collapse" aria-labelledby="asett" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Aset:</h6>
                <a class="collapse-item" href="">Data Aset</a>
                <a class="collapse-item" href="">Laporan</a>
            </div>
        </div>
    </li>
    
    <!-- Divider -->
    @endhasanyrole
    @role('admin')
    <hr class="sidebar-divider">
    @endrole
    @hasanyrole('admin|sdm')
    <!-- Heading SDM -->
    <div class="sidebar-heading">
        SDM
    </div>

    <!--Nav karyawan -->
    <li class="nav-item active">
        @can('sdm-list')
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#colkaryawan" aria-expanded="true" aria-controls="colkaryawan">
            <i style="color: #e64614" class="fas fa-fw fa fa-user-tie"></i>
            <span>Data Karyawan</span>
        </a>
        @endcan

        <div id="colkaryawan" class="collapse" aria-labelledby="collkaryawan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Karyawan:</h6>
                @can('sdm-list')
                <a class="collapse-item" href="{{route('karyawan.index')}}">Karyawan</a>
                @endcan
                @can('sdm-list')
                <a class="collapse-item" href="{{route('jabatan.index')}}">Jabatan</a>
                @endcan
                @can('sdm-list')
                <a class="collapse-item" href="{{route('divisi.index')}}">Divisi</a>
                @endcan
                @can('sdm-list')
                <a class="collapse-item" href="{{route('mataanggaran.index')}}">Mataanggaran</a>
                @endcan
                <a class="collapse-item" href="">Nominatif</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @hasanyrole('admin|sdm')
    <!--Nav Cuti -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cuti" aria-expanded="true" aria-controls="cuti">
            <i style="color: #e64614" class="fas fa-fw fa fa-luggage-cart"></i>
            <span>Cuti</span>
        </a>

        <div id="cuti" class="collapse" aria-labelledby="cutii" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cuti:</h6>
                <a class="collapse-item" href="">Permohonan</a>
                <a class="collapse-item" href="">Persetujuan</a>
                <a class="collapse-item" href="">Laporan Realisasi</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @hasanyrole('admin|sdm')
    <!-- Nav Pemutakhiran Data -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pemutakhiran" aria-expanded="true" aria-controls="pemutakhiran">
            <i style="color: #e64614" class="fas fa-fw fa fa-chart-pie"></i>
            <span>Pemutakhiran Data</span>
        </a>

        <div id="pemutakhiran" class="collapse" aria-labelledby="pemutakhirann" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pemutakhiran:</h6>
                <a class="collapse-item" href="">Permohonan Pemutakhiran</a>
                <a class="collapse-item" href="">Laporan Pemutakhiran</a>
                <a class="collapse-item" href="">Rekap Pemutakhiran</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @hasanyrole('admin|sdm')
    <!-- Nav Pay Pall -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gaji" aria-expanded="true" aria-controls="gaji">
            <i style="color: #e64614" class="fas fa-fw fa fa-money-check-alt"></i>
            <span>Gaji</span>
        </a>

        <div id="gaji" class="collapse" aria-labelledby="gajii" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gaji:</h6>
                <a class="collapse-item" href="">Daftar Gaji</a>
                <a class="collapse-item" href="">Daftar PPN</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @role('admin')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Admin Page -->
    <div class="sidebar-heading">
        Inventory
    </div>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stokgudang" aria-expanded="true" aria-controls="paypal">
            <i style="color: #e64614" class="fas fa-fw fa fa-archive"></i>
            <span>Stok Gudang</span>
        </a>

        <div id="stokgudang" class="collapse" aria-labelledby="stokgudang" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Stok Gudang:</h6>
                <a class="collapse-item" href="">Data Barang</a>
                <a class="collapse-item" href="">Laporan Rekap</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#spj" aria-expanded="true" aria-controls="paypal">
            <i style="color: #e64614" class="fas fa-fw fa  fa-plane"></i>
            <span>SPJ(Perjalanan Dinas)</span>
        </a>

        <div id="spj" class="collapse" aria-labelledby="spj" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Spj:</h6>
                <a class="collapse-item" href="">PPD</a>
                <a class="collapse-item" href="">SPPD</a>
            </div>
        </div>
    </li>
    @endrole
    @hasanyrole('admin|umum')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Log Page -->
    <div class="sidebar-heading">
        Log Histori
    </div>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#histori" aria-expanded="true" aria-controls="histori">
            <i style="color: #e64614" class="fas fa-fw fa fa-users"></i>
            <span>Pengadaan Histori</span>
        </a>

        <div id="histori" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Log:</h6>
                <a class="collapse-item" href="{{route('sppbjhistori.index')}}">Sppbj</a>
                <a class="collapse-item" href="{{route('skbhistori.index')}}">Skb</a>
                <a class="collapse-item" href="{{route('beritahistori.index')}}">Berita Serah Terima</a>
                <a class="collapse-item" href="{{route('spmhistori.index')}}">Spm</a>
                <a class="collapse-item" href="{{route('verspmhistori.index')}}">Verspm</a>
            </div>
        </div>
    </li>
    @endhasanyrole
    @role('admin')

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Admin Page -->
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i style="color: #e64614" class="fas fa-fw fa fa-users"></i>
            <span>Role dan User</span>
        </a>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admin Page:</h6>
                <a class="collapse-item" href="{{route('roles.index')}}">Roles</a>
                <a class="collapse-item" href="{{route('users.index')}}">Users</a>
                <a class="collapse-item" href="{{route('satuan.index')}}">Satuan</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    @endrole
</ul>
