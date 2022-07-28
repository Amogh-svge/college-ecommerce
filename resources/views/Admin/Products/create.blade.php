@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Add_Products</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-primary">Products</h6>
            </div>
            <div class="card-body">
                <form action={{ route('products.store') }} enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Name</label>
                        <input type="Text" class="form-control" name="prod_name" id="prod_name"
                            placeholder="Product's Name" value="{{ old('prod_name') }}" required
                            @error('prod_name') style = "border-color: red;" @enderror>
                        @error('prod_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Price</label>
                        <input type="number" class="form-control" name="price" id="price" step="0.001"
                            placeholder="Enter Price" value="{{ old('price') }}" required
                            @error('price') style = "border-color: red;" @enderror>

                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select name="category_id" class="form-control" id="category_id" required
                            @error('category_id') style = "border-color: red;" @enderror>
                            <option value="0">--- Select Category ---</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == old('category_id') ? 'selected' : '' }}>
                                    {{ $item->parent_id == 0 ? $item->name : '--->' . $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short Description</label>
                        <textarea class="form-control ckeditor" name="short_desc" rows="2" required
                            @error('price') style = "border-color: red;" @enderror>{{ old('short_desc') }}</textarea>
                        @error('short_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Product Description</label>
                        <textarea class="form-control ckeditor" name="prod_desc" id="editor" rows="8">{{ old('prod_desc') }}</textarea>
                        @error('prod_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Product Specification</label>
                        <textarea class="form-control ckeditor" name="specification" id="editor1" rows="8">{{ old('specification') }}</textarea>
                        @error('specification')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="custom-file">
                        <input type="file" accept="image/*" id="image" name="image" required>
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group mt-4">
                        <input type="submit" value="Add Products" class="btn btn-primary m-2">
                        <input type="reset" value="Clear" class="btn btn-secondary ">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
