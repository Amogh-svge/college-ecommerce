@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Role_list</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
                                <th>Role Name</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N</th>
                                <th>Role Name</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($roles as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ strip_tags(substr($item->description, 0, 60)) }}...</td>
                                    <td> {{ Carbon::parse($item->created_at)->isoFormat('LL') }}</td>
                                    <td><a href={{ route('roles.edit', [$item->id]) }}><i class="fas fa-edit mr-1"></i></a>
                                    </td>
                                    <td>
                                        <form action={{ route('roles.destroy', $item->id) }} method="POST">
                                            @csrf
                                            @method('delete')
                                            {{-- <button type="submit" class="btn btn-light btn-sm btn-svg-icon">
                                                <i class="fas fa-trash ml-1"></i>
                                            </button> --}}
                                            <a onclick="event.preventDefault();  
                                            window.confirm('Do you want to delete?')===true && this.closest('form').submit();"
                                                href={{ route('roles.destroy', $item->id) }}><i
                                                    class="fas fa-trash ml-1"></i></a>
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
