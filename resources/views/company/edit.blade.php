@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    Edit Company {{$company->company_name}}
                    <a href="{{route('company.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Name</div>
                                  <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{$company->company_name}}">
                                </div>
                            </div>                            
                        </div> 
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Address</div>
                                  <input type="text" name="company_address" class="form-control" placeholder="Company Address" value="{{$company->company_address}}">
                                </div>
                            </div>                            
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Website</div>
                                  <input type="text" name="company_website" class="form-control" placeholder="Company Website" value="{{$company->company_website}}">
                                </div>
                            </div>                            
                        </div>  
                        <div class="row my-3">
                            <div class="col-lg-12 col-12">
                                <div class="input-group">
                                  <div class="input-group-text">Contact</div>
                                  <input type="tel" name="company_contact_no" class="form-control" placeholder="Contact Number" value="{{$company->company_contact_no}}">
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
                                @if($company->company_logo)
                                    <img src="{{asset('uploads/company')}}/{{$company->company_logo}}" id="output-image" alt="{{$company->company_name}}" width="100%">
                                @else
                                <img id="output-image" width="100%">
                                @endif
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