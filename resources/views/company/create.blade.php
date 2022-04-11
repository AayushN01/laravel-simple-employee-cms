@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    Add a new Company
                    <a href="{{route('company.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Name <span class="text text-danger">*</span></div>
                                  <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                                  @error('company_name') <span class="text text-danger">{{$message}}*</span>@enderror
                                </div>
                            </div>                            
                        </div> 
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Address</div>
                                  <input type="text" name="company_address" class="form-control" placeholder="Company Address">
                                </div>
                            </div>                            
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Website</div>
                                  <input type="text" name="company_website" class="form-control" placeholder="Company Website">
                                </div>
                            </div>                            
                        </div>  
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Contact</div>
                                  <input type="text" name="company_contact_no" class="form-control" placeholder="Contact Number">
                                </div>
                            </div>                            
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-7 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Company Logo</div>
                                  <input type="file" name="company_logo" class="form-control" id="input-file" onchange="loadFile(event)">
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <img id="output-image" width="100%">
                            </div>                           
                        </div>
                        <div class="row my-3">
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