{{-- @extends('Admin/dashboard_layout')
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

        </div>
        <!-- Content Row -->
    </div>
    <!-- /.container-fluid -->
@endsection --}}


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>asdasd</title>

    <!-- Custom fonts for this template-->

    <link rel="stylesheet" href="/css/toster.css">

</head>

<body>
    <div class="tost_container">

        <div class="tost" id="toast">
            <div class="tost-header">
                <span class="tost-header__dot">&nbsp;</span>
                <strong class="">Notification</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" id="close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="tost-body">
                Hello, world! This is a toast message.
                Hello, world! This is a toast message.
            </div>
        </div>

    </div>

    <script>
        const close = document.querySelectorAll('.btn-close');
        let closeToast = document.querySelectorAll('.tost');

        for (let i = 0; i < close.length; i++) {
            close[i].addEventListener("click", () => {
                closeHandler(i);
            });
        }

        const closeHandler = (id) => closeToast[id].style.display = "none";

        // setTimeout(closeHandler, 5000);
    </script>
</body>

</html>
