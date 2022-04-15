@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    <i class="fas fa-table me-1"></i>
                    List of all categories
                    <a href="{{route('category.create')}}" class="btn btn-primary btn-sm" style="float: right;"> <i class="fas fa-plus me-2"></i>Add New Category</a>
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
                                    <th>SNo.</th>
                                    <th width="15%">Category Id</th>
                                    <th>Category Code</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <th>{{++$key}}</th>
                                    <td>{{$category->id}}</td>
                                    <td>{{strtoupper($category->category_code)}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        @if($category->status == 'inactive') 
                                            <span class="badge bg-danger">Inactive</span>
                                        @elseif($category->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger btn-sm">Delete</a>
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