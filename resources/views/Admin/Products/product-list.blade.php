@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Products_List</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                @if ($message = Session::get('success'))
                    <h6 class=" mt-3 text-success">{{ $message }}</h6>
                @else
                    @php
                        $message = Session::get('failure');
                    @endphp
                    <h6 class=" mt-3 text-danger">{{ $message }}</h6>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Upload Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Upload Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($product as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ strip_tags(substr($item->prod_name, 0, 30)) }}</td>
                                    <td>{{ strip_tags(substr($item->prod_desc, 0, 50)) }}</td>
                                    <td>{{ $item->categ->name }}</td>
                                    <td>Rs {{ number_format($item->price, 2, '.', '') }}</td>
                                    <td> {{ Carbon::parse($item->created_at)->isoFormat('LL') }}</td>
                                    <td><a href={{ route('products.edit', [$item->id]) }}><i
                                                class="fas fa-edit mr-1"></i></a></td>
                                    <td>
                                        <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a onclick="event.preventDefault();
                                             window.confirm('Do you want to delete?')===true && this.closest('form').submit();"
                                                href="#" type="submit"><i class="fas fa-trash ml-1"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
