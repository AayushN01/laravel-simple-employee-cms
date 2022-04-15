@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                   Edit Category <span class="text text-success">{{$category->category_name}}</span>
                    <a href="{{route('category.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('category.update',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category Code</label>
                                    <input type="text" class="form-control" name="category_code" style="text-transform: uppercase;" value="{{$category->category_code}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="inactive" @if($category->status == 'inactive') selected @endif>Inactive</option>
                                        <option value="active" @if($category->status == 'active') selected @endif>Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>                     
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection