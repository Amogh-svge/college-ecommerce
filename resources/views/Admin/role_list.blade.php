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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created-Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created-Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->roles->role }}</td>
                                    <td> {{ Carbon::parse($item->created_at)->isoFormat('LL') }}</td>
                                    <td><a href={{ route('roles.edit', [$item->id]) }}><i
                                                class="fas fa-edit mr-1"></i></a>
                                    </td>
                                    <td>
                                        <form action={{ route('delete_user', $item->id) }} method="POST">
                                            @csrf
                                            @method('delete')
                                            {{-- <button type="submit" class="btn btn-light btn-sm btn-svg-icon">
                                                <i class="fas fa-trash ml-1"></i>
                                            </button> --}}
                                            <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                href={{ route('delete_user', $item->id) }}><i
                                                    class="fas fa-trash ml-1"></i></a>
                                        </form>
                                    </td>
                                    @switch($item->role_checker)
                                        @case('1')
                                            <td style="color: rgb(80, 189, 80);">Accepted</td>
                                        @break

                                        @case('0')
                                            <td>Default</td>
                                        @break

                                        @default
                                            <td><a href={{ route('roles_accepted', $item->id) }}><i
                                                        class="fas fa-check fa-lg mr-2" style="color:rgb(49, 197, 49);"></i></a>|<a
                                                    href={{ route('roles_rejected', $item->id) }}><i
                                                        class="fas fa-times fa-lg ml-2" style="color:red;"></i></a></td>
                                    @endswitch
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
