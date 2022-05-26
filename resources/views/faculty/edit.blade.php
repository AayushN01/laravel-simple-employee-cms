@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                   Edit Faculty <span class="text text-success">{{$faculty->code}}</span>
                    <a href="{{route('faculty.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('faculty.update',$faculty->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Faculty Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$faculty->name}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">faculty Code</label>
                                    <input type="text" class="form-control" name="code" style="text-transform: uppercase;" value="{{$faculty->code}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Active" @if($faculty->status == 'Active') selected @endif>Active</option>
                                        <option value="Inactive" @if($faculty->status == 'Inactive') selected @endif>Inctive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>                     
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection