<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: rgb(56, 145, 166)">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{Route('admin.index')}}" style="margin-top: 40px; margin-bottom: 40px;">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{url('backend/img/asdp.svg')}}" alt="" style="width: 100%;">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">asdp</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{Route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengadaan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{''}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>