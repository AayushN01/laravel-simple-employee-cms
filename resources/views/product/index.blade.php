@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    <i class="fas fa-table me-1"></i>
                    List of all products
                    <a href="{{route('product.create')}}" class="btn btn-primary btn-sm" style="float: right;"> <i class="fas fa-plus me-2"></i>Add New Product</a>
                </div>
                <div class="card-body">
                    @if(Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success">
                        {{Illuminate\Support\Facades\Session::get('success')}}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th width="12%">Product Code</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock Status</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td><img src="{{asset('uploads/products')}}/{{$product->image}}" alt="{{$product->product_name}}" height="50" width="50"></td>
                                        <th>{{strtoupper($product->product_code)}}</th>
                                        <td>{{strtoupper($product->product_name)}}</td>
                                        <td>{{$product->category->category_name}}</td>
                                        <td>Rs. {{$product->price}}</td>
                                        <td>@if($product->is_sale == 'no') Out of Stock @elseif ($product->is_sale == 'yes') In Stock @endif</td>
                                        <td>@if($product->status == 'inactive') <span class="badge bg-danger">Inactive</span> @elseif ($product->status == 'active') <span class="badge bg-success">Active</span> @endif</td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable();
        });
    </script>
@endpush
@endsection