@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    <i class="fas fa-table me-1"></i>
                    List of all employees
                    <a href="{{route('employee.create')}}" class="btn btn-primary btn-sm" style="float: right;"> <i class="fas fa-plus me-2"></i>Add New Employee</a>
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
                                    <th>Photo</th>
                                    <th>Full Name</th>
                                    <th>Name of the Company</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $key => $employee )
                                    <tr>
                                        <th>{{++$key}}</th>
                                        <td><img src="{{asset('uploads/employee')}}/{{$employee->photo}}" alt="" class="rounded-circle" height="50" width="50"></td>
                                        <td>{{$employee->first_name}}&nbsp;{{$employee->last_name}}</td>
                                        <td>{{$employee->company->company_name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>
                                            <a href="{{route('employee.show',$employee->id)}}" class="btn btn-primary btn-sm">Show</a>
                                            <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{route('employee.delete',$employee->id)}}" class="btn btn-danger btn-sm">Delete</a>
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