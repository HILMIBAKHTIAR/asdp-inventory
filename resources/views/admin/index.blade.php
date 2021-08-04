<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <link href="{{url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('backend/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom styles for this template-->
    <link href="{{url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">asdp</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{''}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="{{url('backend/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card mb-4">
                                <div class="card-footer">

                                    <!-- judul form-->

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Formulir Permintaan Pengadaan <br> Barang/Jasa</h1>
                                    </div>

                                    <!-- isi form input -->
                                    <form class="sppbj">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label>Dari</label>
                                                    <input type="text" class="form-control" />
                                                    <label>Nama Pengadaan</label>
                                                    <input type="text" class="form-control" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Mata Anggaran</label>
                                                    <input type="text" class="form-control">
                                                    <label>Tanggal Dibutuhkan</label>
                                                    <input type="date" class="form-control" />
                                                </div>
                                            </div>

                                            <br>
                                            <!-- Pengadaan Barang -->
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Form Barang/Jasa</h1>
                                            </div>
                                            <div class="form-row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Jumlah</th>
                                                                <th>Satuan</th>
                                                                <th>Nama Barang</th>
                                                                <th>Spesifikasi</th>
                                                                <th>Harga Satuan</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control"></td>
                                                                <td><input type="text" class="form-control"></td>
                                                                <td><input type="text" class="form-control"></td>
                                                                <td><input type="text" class="form-control"></td>
                                                                <td><input type="text" class="form-control"></td>
                                                                <td class=""><input href="" class="btn btn-primary mr-2" type="button" name="tambah" id="tambah" value="Tambah"></input></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- FORM TTD -->
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Form Tanda Tangan</h1>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label>Catatan Peminta Barang/Jasa</label>
                                                    <input type="text" class="form-control" />
                                                    <label>Catatan</label>
                                                    <input type="text" class="form-control" />
                                                    <label>Catatan Ketersediaan Anggaran</label>
                                                    <input type="text" class="form-control" />
                                                    <label>Catatan Ketersediaan Stok</label>
                                                    <input type="text" class="form-control" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Peminta Barang/Jasa</label>
                                                    <input type="text" class="form-control">
                                                    <label>General Manager Cabang Ketapang</label>
                                                    <input type="text" class="form-control">
                                                    <label>Manager Keuangan</label>
                                                    <input type="text" class="form-control">
                                                    <label>Manager SDM & Umum</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <center>
                                                <input type="submit" class="btn btn-success" name="print" id="print" value="Print">
                                                <input type="button" class="btn btn-primary" name="selanjutnya" id="selanjutnya" value="Selanjutnya">
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('backend/vendor/jquery/jquery.min.js')}}">
    </script>
    <script src="{{url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('backend/vendor/jquery-easing/jquery.easing.min.js')}}">
    </script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('backend/js/sb-admin-2.min.js')}}">
    </script>

    <!-- Page level plugins -->
    <script src="{{url('backend/vendor/chart.js/Chart.min.js')}}">
    </script>

    <!-- Page level custom scripts -->
    <script src="{{url('backend/js/demo/chart-area-demo.js')}}">
    </script>
    <script src="{{url('backend/js/demo/chart-pie-demo.js')}}">
    </script>

    <script>
        $(document).ready(function() {
            var x = 1;
            $("#tambah").click(function() {
                $("#dataTable").append('<tr><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td><input type = "text" class = "form-control" /></td><td class = "" ><input href = "" class = "btn btn-danger mr-2"type = "button"name = "hapus" id = "hapus" value = "Hapus" /></input></td></tr>');
                $("#dataTable").on('click', '#hapus', function() {
                    $(this).closest('tr').remove();
                })
            });
        });
    </script>

</body>

</html>