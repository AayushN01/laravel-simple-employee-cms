@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div>
                    <a href="{{route('employee.index')}}" class="btn btn-primary btn-sm" style="float: right;"> <i class="fas fa-arrow-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-4 col-12" style="border-right: 1px solid rgba(0, 0, 0, 0.227);">                            
                            <img src="{{asset('uploads/employee')}}/{{$employee->photo}}" alt="{{$employee->name}}" width="100%">
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$employee->first_name}}&nbsp;{{$employee->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Company</th>
                                        <td>{{$employee->company->company_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>{{$employee->designation}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$employee->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>{{$employee->contact_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{$employee->dob}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>
@endsection