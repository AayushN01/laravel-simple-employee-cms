@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    Add a new Course
                    <a href="{{route('course.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('course.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="form-label">Faculty</label>
                                    <select name="faculty_id" id="faculty_id_dropdown" class="form-control">
                                        <option value="#" selected disabled>Choose faculty</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Course Name <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="course_name">
                                    @error('course_name')
                                        <span class="text text-danger">{{$message}}*</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Code <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="course_code" style="text-transform: uppercase;">
                                    @error('course_code')
                                        <span class="text text-danger">{{$message}}*</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
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