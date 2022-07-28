@extends('admin.dashboard_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Edit_Products</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-primary">Add-Products</h6>
            </div>
            <div class="card-body">

                <form action={{ route('products.update', $editProduct->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Name</label>
                        <input type="text" class="form-control" name="prod_name" id="exampleFormControlInput1"
                            placeholder="Product's Name" value="{{ $editProduct->prod_name }}"
                            @error('prod_name') style = "border-color: red;" @enderror>
                        @error('prod_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Price</label>
                        <input type="number" class="form-control" name="price" id="exampleFormControlInput1" step="0.001"
                            placeholder="Enter Price" value={{ $editProduct->price }}
                            @error('price') style = "border-color: red;" @enderror>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1"
                            @error('category_id') style = "border-color: red;" @enderror>
                            <option value="0">--- Select Category ---</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $editProduct->category_id ? 'selected' : '' }}>{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short Description</label>
                        <textarea class="form-control ckeditor" name="short_desc" rows="2"
                            @error('price') style = "border-color: red;" @enderror>{{ $editProduct->short_desc }}</textarea>
                        @error('short_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Product Description</label>
                        <textarea class="form-control ckeditor" name="prod_desc" id="editor"
                            rows="8">{{ $editProduct->prod_desc }}</textarea>
                        @error('prod_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="custom-file">
                        <input type="file" id="customFile" name="image">
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
