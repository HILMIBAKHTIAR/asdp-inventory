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

    <!-- Heading Pengadaan -->
    <div class="sidebar-heading">
        Pengadaan surat
    </div>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i style="color: #e64614" class="fas fa-fw fa fa-book"></i>
            <span>Pengadaan</span>
        </a>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengadaan Surat:</h6>
                <a class="collapse-item" href="{{route('sp2bj.create')}}">Pengadaan Sistematis</a>
                <a class="collapse-item" href="{{route('surat.index')}}">Pengadaan Manual</a>
            </div>
        </div>
    </li>

    @role('admin')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Data Kantor Page -->
    <div class="sidebar-heading">
        Data Kantor
    </div>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i style="color: #e64614" class="fas fa-fw fa fa-file-alt"></i>
            <span>Data Kantor</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Kantor Page:</h6>
                <a class="collapse-item" href="{{route('karyawan.index')}}">Karyawan</a>
                <a class="collapse-item" href="{{route('mataanggaran.index')}}">Mataanggaran</a>
            </div>
        </div>
    </li>

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