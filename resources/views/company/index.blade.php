@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    <i class="fas fa-table me-1"></i>
                    List of all companies
                    <a href="{{route('company.create')}}" class="btn btn-primary btn-sm" style="float: right;"> <i class="fas fa-plus me-2"></i>Add New Company</a>
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
                                    <th>Company Logo</th>
                                    <th>Name of the Company</th>
                                    <th>Address</th>
                                    <th>Website</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $key => $company)
                                    <tr>
                                        <th>{{++$key}}</th>
                                        <td><img src="{{asset('uploads/company')}}/{{$company->company_logo}}" alt="{{$company->name}}" height="80" width="80"></td>
                                        <td>{{ucfirst($company->company_name)}}</td>
                                        <td>{{$company->company_address}}</td>
                                        <td><a href="{{url($company->company_website)}}" target="__blank">{{$company->company_website}}</a></td>
                                        <td>
                                            <a href="{{route('company.edit',$company->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{route('company.delete',$company->id)}}" class="btn btn-danger btn-sm">Delete</a>
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