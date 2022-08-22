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

                <form action={{ route('categories.store') }} enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Category Name</label>
                        <input type="Text" class="form-control" name="name" id="name" placeholder="Category's Name"
                            value="{{ old('name') }}" @error('name') style = "border-color: red;" @enderror required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Parent Category</label>
                        <select name="parent_id" class="form-control" id="parent_id"
                            @error('parent_id') style = "border-color: red;" @enderror>
                            <option value="0">--- Select Category ---</option>
                            @foreach ($parentCategory as $category)
    
                                   <option value=""> {{ $category->children != null ? $category->children->name . $category->name : $category->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Category Description</label>
                        <textarea class="form-control ckeditor" name="description" id="editor" rows="8">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="custom-file">
                        <input type="file" accept="image/*" id="customFile" name="image" required>
                    </div>

                    <div class="form-group mt-4">
                        <input type="submit" value="Add Products" class="btn btn-warning m-2">
                        <input type="reset" value="Clear" class="btn btn-secondary ">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
