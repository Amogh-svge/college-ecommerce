@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Category_List</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category</h6>
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
                            <tr>
                                <th>S.N</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Upload Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Upload Date</th>
                                <th>Edit</th>
                                <th>delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ strip_tags(substr($item->description, 0, 50)) }}</td>
                                    <td> {{ Carbon::parse($item->created_at)->isoFormat('LL') }}
                                    </td>
                                    <td><a href="{{ route('categories.edit', [$item->id]) }}"><i
                                                class="fas fa-edit mr-1"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a onclick="event.preventDefault();
                                             window.confirm('Do you want to delete?')===true && this.closest('form').submit(); "
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
