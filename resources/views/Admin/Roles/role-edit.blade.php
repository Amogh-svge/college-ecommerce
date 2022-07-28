@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Add_Role</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-primary">Role</h6>
            </div>
            <div class="card-body">
                <form action={{ route('roles.update', $role->id) }} method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Role</label>
                        <input type="Text" class="form-control" name="role" id="role"
                            placeholder="Assign Role Name" value="{{ $role->role }}" 
                            @error('role') style = "border-color: red;" @enderror>
                        @error('role')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Role Description</label>
                        <textarea class="form-control ckeditor" name="description" id="editor" rows="8">{{ $role->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <input type="submit" value="Update Role" class="btn btn-primary m-2">
                        <input type="reset" value="Clear" class="btn btn-secondary ">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
