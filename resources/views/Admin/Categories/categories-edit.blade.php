@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Add_Categories</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">

                <form action={{ route('categories.update', $categories->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Category Name</label>
                        <input type="Text" class="form-control" name="name" id="exampleFormControlInput1"
                            placeholder="Category's Name" value="{{ $categories->name }}"
                            @error('name') style = "border-color: red;" @enderror>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <x-forms.select name="category" class="form-control" id="exampleFormControlSelect1">
                            <option value="#">--- Select Category ---</option>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </x-forms.select>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Category Description</label>
                        <textarea class="form-control ckeditor" name="description" id="editor"
                            rows="8">{{ $categories->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="custom-file">
                        <input type="file" accept="image/*" id="customFile" name="image">
                    </div>

                    <div class="form-group mt-4">
                        <input type="submit" value="Update Products" class="btn btn-primary m-2">
                        <input type="reset" value="Clear" class="btn btn-secondary ">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
