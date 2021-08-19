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
    <li class="nav-item active">
        <a class="nav-link" href="{{route('sp2bj.create')}}">
            <i style="color: #e64614" class="fas fa-fw fa fa-book"></i>
            <span>Pengadaan</span></a>
    </li>

    @role('admin')
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <li class="nav-item active">
        <a class="nav-link" href="{{route('karyawan.index')}}">
            <i style="color: #e64614" class="fas fa-fw fa fa-user"></i>
            <span>Karyawan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('mataanggaran.index')}}">
            <i style="color: #e64614" class="fas fa-fw fa fa-file-alt"></i>
            <span>Mata Anggaran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="{{route('roles.index')}}">
            <i style="color: #e64614" class="fas fa-fw fa fa-user-tag"></i>
            <span>Role</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('users.index')}}">
            <i style="color: #e64614" class="fas fa-fw fa fa-users"></i>
            <span>User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endrole

</ul>