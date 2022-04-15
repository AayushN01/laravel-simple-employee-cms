@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    Edit Employee <span class="h5 text-success">({{strtoupper($employee->first_name)}}&nbsp;{{strtoupper($employee->last_name)}})</span>
                    <a href="{{route('employee.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('employee.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender" class="mb-2">Gender</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" @if($employee->gender == 'Male') checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Male
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" @if($employee->gender == 'Female') checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Female
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Other" @if($employee->gender == 'Other') checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Other
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="{{ Carbon\Carbon::parse($employee->dob)->format('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_no" value="{{$employee->contact_no}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$employee->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="company" class="form-label">Name of the Company <span class="text text-danger">*</span></label>
                                    <select name="company_id" id="company_id" class="form-control">
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}" @if($employee->company_id == $company->id) selected @endif>{{$company->company_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{$employee->designation}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-7">
                                <label for="photo">Upload Profile Picture</label>
                                <input type="file" class="form-control" name="photo" id="image" onchange="loadFile(event)">
                            </div>
                            <div class="col-sm-5">
                                @if($employee->photo)
                                <img src="{{asset('uploads/employee')}}/{{$employee->photo}}" id="output-image" alt="" height="150" width="150">
                                @else
                                <img src="" id="output-image" alt="" height="150" width="150">
                                @endif
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