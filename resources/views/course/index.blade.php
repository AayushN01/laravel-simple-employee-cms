@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    <i class="fas fa-table me-1"></i>
                    List of all courses
                    <a href="{{route('course.create')}}" class="btn btn-primary btn-sm" style="float: right;"> <i class="fas fa-plus me-2"></i>Add a New Course</a>
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
                                    <th>Code</th>
                                    <th>Course Name</th>
                                    <th>Faculty</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $key => $course)
                                <tr>
                                    <th>{{++$key}}</th>
                                    <td>{{strtoupper($course->course_code)}}</td>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{$course->faculty->code}}</td>
                                    <td>
                                        @if($course->status == 'Inactive') 
                                            <span class="badge bg-danger">Inactive</span>
                                        @elseif($course->status == 'Active')
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('course.edit',$course->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{route('course.delete',$course->id)}}" class="btn btn-danger btn-sm">Delete</a>
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