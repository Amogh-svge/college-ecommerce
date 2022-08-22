@php
use App\Models\Role;
@endphp
@extends('Admin/dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Products</div>
                                @if (Auth::user()->role_id == '3')
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allProducts }}</div>
                                @else
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($total_Products) }}</div>
                                @endif

                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Vendors Card  -->
            @if (Auth::user()->role_id != 1)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Vendors
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total_vendors }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Users
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total_users }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Total Amount Card  -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Amount</div>
                                    @php
                                        $total_price = 0;
                                        foreach ($total_Products as $item) {
                                            $total_price += $item->price;
                                        }
                                    @endphp
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. {{ $total_price }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Empty Card  -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Customers
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            @if (Auth::user()->role_id == 3)
                                <a href={{ route('dashboard_roles') }} class="col mr-2 ">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pending }}</div>
                                </a>
                            @else
                                <a href={{ route('order.index') }} class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pending_orders }}</div>
                                </a>
                            @endif

                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <!-- Content Row -->



        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                    </div>
                    <div class="card-body">
                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                            CSS bloat and poor page performance. Custom CSS classes are used to create
                            custom components and custom utility classes.</p>
                        <p class="mb-0">Before working with this theme, you should become familiar with
                            the
                            Bootstrap framework, especially the utility classes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!--Toast Notification Message-->
    @if ($notification_request != null)
        <div class="tost_container">
            <div class="tost">
                <div class="tost-header">
                    <span class="tost-header__dot">&nbsp;</span>
                    <strong class="">Notification</strong>
                    <button type="button" class="btn-close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="tost-body">

                    @if (Auth::user()->role_id == Role::$SUPER_ADMIN)
                        @php
                            // -1 because one user name is already shown in notification.
                            $notification_req_no = count($notification_request) - 1;
                        @endphp
                        @if ($notification_req_no > 0)
                            <a class="text-dark text-decoration-none" href="{{ route('dashboard_roles') }}">
                                <b>{{ $first_notification_req->name }}</b> and <b>{{ $notification_req_no }}</b> others
                                requests to become an
                                Admin.
                            </a>
                        @else
                            <a class="text-dark text-decoration-none" href="{{ route('dashboard_roles') }}">
                                <b>{{ $first_notification_req->name }}</b> requests to become an
                                Admin.
                            </a>
                        @endif
                    @endif

                    @if (Auth::user()->role_id == Role::$VENDOR)
                        @if ($notification_request > 0)
                            <a class="text-dark text-decoration-none" href={{ route('order.index') }}>
                                <i class="fas fa-clipboard-list fa-lg text-dark pr-1"></i>
                                <big class="font-weight-bold">{{ $notification_request }}</big> orders have been placed.
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endif

@endsection
