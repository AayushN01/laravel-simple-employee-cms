@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    Add a new Employee
                    <a href="{{route('employee.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">First Name <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                                    @error('first_name')
                                        <span class="text text-danger">{{$message}}*</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender" class="mb-2">Gender</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Male
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Female
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Other">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Other
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="your@email.com">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_no" placeholder="+977-9874653210">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="company" class="form-label">Name of the Company <span class="text text-danger">*</span></label>
                                    <select name="company_id" id="company_id" class="form-control">
                                        <option value="#" selected disabled>Choose name of company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <span class="text text-danger">{{$message}}*</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-7">
                                <label for="photo">Upload Profile Picture</label>
                                <input type="file" class="form-control" name="photo" id="image" onchange="loadFile(event)">
                            </div>
                            <div class="col-sm-5">
                                <img src="" id="output-image" alt="">
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