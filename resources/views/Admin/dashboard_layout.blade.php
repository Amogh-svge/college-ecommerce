@php
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

if (Auth::user()->role_id == Role::$SUPER_ADMIN) {
    $admin_req = User::where('role_checker', Role::$role_vendor)->get();
    $admin_req_first = User::where('role_checker', Role::$role_vendor)->first();
}

if (Auth::user()->role_id == Role::$VENDOR) {
    $admin_req = Order::where('order_status', 'purchased')->get();
    $admin_req_first = Order::where('order_status', 'purchased')->first();
}

@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KinBech - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/vendor/fontawesome-5.6.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/toast.css">

</head>

<body id="page-top">
    @if (Auth::user()->role_id == Role::$SUPER_ADMIN || (Auth::user()->role_id == Role::$VENDOR && Auth::check()))
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!--Sidebar -->
            @include('Admin/dashboard_sidebar')
            <!-- End of Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Topbar Search -->
                        <div
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                @if (Auth::user()->role_id == Role::$SUPER_ADMIN)
                                    <h3 style="color: rgb(70, 79, 88);">Super Admin</h3>
                                @else
                                    <h3 style="color: rgb(70, 79, 88);">Vendor</h3>
                                @endif

                            </div>
                        </div>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                @php
                                    $no_admin_req = count($admin_req) - 1;
                                @endphp

                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-lg fa-fw text-dark"></i>
                                    <!-- Counter - Alerts -->
                                    <span
                                        class="badge badge-danger badge-counter">{{ session('order_req') > 0 ? '1+' : '' }}</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header " style="background-color: #272726f1">
                                        Notification Center
                                    </h6>

                                    @if (session('order_req') > 0)
                                        <a class="dropdown-item d-flex align-items-center"
                                            href={{ Auth::user()->role_id == Role::$SUPER_ADMIN ? route('dashboard_roles') : route('order.index') }}>
                                            <div class="mr-3">
                                                <div
                                                    class="icon-circle {{ Auth::user()->role_id == Role::$SUPER_ADMIN ? 'bg-success' : 'bg-primary' }}">
                                                    <i class="fas fa-store text-white"></i>
                                                </div>
                                            </div>

                                            <div>
                                                @if (Auth::user()->role_id == Role::$SUPER_ADMIN)
                                                    @if ($no_admin_req > 0)
                                                        <div class="small text-gray-800">
                                                            {{ Carbon::parse(date('m.d.y'))->isoFormat('LL') }}</div>
                                                        <b>{{ $admin_req_first->name }}</b> and
                                                        <b>{{ $no_admin_req }}</b>
                                                        others
                                                        requests to become an
                                                        Admin.
                                                    @else
                                                        <div class="small text-gray-800">
                                                            {{ Carbon::parse(date('m.d.y'))->isoFormat('LL') }}</div>
                                                        <b>{{ $admin_req_first->name }}</b> requests to become an Admin.
                                                    @endif
                                                @endif
                                                @if (session('order_req') != null)
                                                    @if (Auth::user()->role_id == Role::$VENDOR)
                                                        <div class="small text-gray-800">
                                                            {{ Carbon::parse(date('m.d.y'))->isoFormat('LL') }}</div>
                                                        Orders Alert: <b>{{ session('order_req') }}</b> orders are
                                                        pending
                                                    @endif
                                                @endif
                                            </div>
                                        </a>
                                    @else
                                        <p class="dropdown-item text-center text-gray-700">No Notifications</p>
                                    @endif


                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All</a>

                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Home
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <!-- Content Wrapper -->
                    @yield('content')
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Main Content -->


                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>&copy; Copyright by AmgCo</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete ?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="btn btn-warning" :href="route('logout')"
                                onclick="event.preventDefault();
                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div
            style="background:rgb(43, 43, 58); height:100vh ; 
                display:grid; place-items:center; align-items:center; ">
            <h4 class="alert">403 | THIS ACTION IS UNAUTHORIZED.</h4>
        </div>
    @endif

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

    <!-- datatables plugin -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>

    <!-- ckeditor plugin -->
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


        //Toast Notitfication

        const close = document.querySelectorAll('.btn-close');
        let closeToast = document.querySelectorAll('.tost');

        for (let i = 0; i < close.length; i++) {
            close[i].addEventListener("click", () => {
                closeHandler(i);
            });

            setTimeout(() => {
                closeHandler(i);
            }, 8000);
        }

        const closeHandler = (id) => {
            closeToast[id].style.display = "none"
        };
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
