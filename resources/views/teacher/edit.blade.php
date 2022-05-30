@extends('layouts.app')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header text-capitalize">
                    Edit Teacher
                    <a href="{{route('teacher.index')}}" class="btn btn-primary btn-sm" style="float: right;"><i class="far fa-arrow-alt-left me-2"></i>Go Back</a>
                </div>
                <div class="card-body">
                    <form class="align-items-center" action="{{route('teacher.update',$teacher->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label"> Name <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{$teacher->name}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{$teacher->designation}}">
                                 </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="form-label"> Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_no" value="{{$teacher->contact_no}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Faculty</label>
                                    <select name="faculty_id" id="faculty_id_dropdown" class="form-control">
                                        @foreach ($faculties as $faculty)
                                            <option value="{{$faculty->id}}" @if($teacher->faculty_id == $faculty->id) selected @endif>{{$faculty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Course</label>
                                    <select name="course_id[]" id="course_id_dropdown" class="form-control" multiple>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Active" @if($teacher->status == 'Active') selected @endif>Active</option>
                                        <option value="Inactive" @if($teacher->status == 'Inactive') selected @endif>Inactive</option>
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
@section('scripts')
<script>
    $(document).ready(function(){
        $('#faculty_id_dropdown').on('change',function(e){
            e.preventDefault();
            var faculty_id = $(this).val();
            // alert(faculty_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{route('teacher.getCourse')}}',
                data: {
                    faculty_id
                },
                dataType: 'json',
                success: function(response){
                    console.log(response.message);
                    $('#course_id_dropdown').html('');
                    $.each(response.message,function(key,value){
                        $('#course_id_dropdown').append('<option value="'+value.id+'">'+value.course_name+'</option>');
                    })
                }
            });
        });
    });
</script>
@endsection
@endsection