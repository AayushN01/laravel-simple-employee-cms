@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    Add a new Product
                    <a href="{{route('product.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Product Name <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="product_name">
                                    @error('product_name')
                                        <span class="text text-danger">{{$message}}*</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Product Code <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="product_code" style="text-transform: uppercase;">
                                    @error('product_code')
                                        <span class="text text-danger">{{$message}}*</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category <span class="text text-danger">*</span></label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        <option value="#" selected>Choose a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" min="5">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-7 form-group">
                                <label for="photo">Upload Image</label>
                                <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)">
                                @error('image') <span class="text text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-sm-5">
                                <img src="" id="output-image" alt="" height="150" width="150">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="is_sale" id="is_sale" class="form-control">
                                        <option value="no" selected>No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="status" id="status" class="form-control">
                                        <option value="inactive" selected>Inactive</option>
                                        <option value="active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>                     
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    var loadFile = function(event) {
      var output = document.getElementById('output-image');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
@endsection