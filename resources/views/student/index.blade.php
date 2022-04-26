@extends('layouts.app')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <div class="card-header text-capitalize">
                        <i class="fas fa-table me-1"></i>
                        List of all Students
                        <a href="" class="btn btn-primary btn-sm" style="float: right;" data-bs-toggle="modal"
                            data-bs-target="#addStudentModal"> <i class="fas fa-plus me-2"></i>Add New Student</a>
                    </div>
                    <!-- Add Student Modal -->
                    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="">
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="name form-control" name="name"
                                                placeholder="Enter Full Name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">EMail</label>
                                            <input type="email" class="email form-control" name="email"
                                                placeholder="Enter Email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Phone</label>
                                            <input type="tel" class="phone form-control" name="phone"
                                                placeholder="Enter Phone No.">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Course</label>
                                            <input type="text" class="course form-control" name="course"
                                                placeholder="Enter Course">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="add_student">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- END OF MODAL --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Course</th>
                                        <th colspan="2" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
@section('scripts')
    <script>
        $(document).ready(function() {
            fetchData();
            function fetchData()
            {
                $.ajax({
                    type: "GET",
                    url: "{{route('student.fetchStdData')}}",
                    dataType: "json",
                    success: function(response){
                        // console.log(response.message);
                        $('tbody').html(''); //First empty table and then loop
                        $.each(response.message, function(key,value){
                            $('tbody').append('<tr>\
                                        <td>'+value.id+'</td>\
                                        <td>'+value.name+'</td>\
                                        <td>'+value.email+'</td>\
                                        <td>'+value.phone+'</td>\
                                        <td>'+value.course+'</td>\
                                        <td><button type="button" value="'+value.id+'" class="edit_student btn btn-warning btn-sm">Edit</button></td>\
                                        <td><button type="button" value="'+value.id+'" class="delete_student btn btn-danger btn-sm">Delete</button></td>\
                                    </tr>');
                        });
                    }
                });
            }

             $('#add_student').click(function(e) {
                e.preventDefault();
                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'phone': $('.phone').val(),
                    'course': $('.course').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('student.store')}}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        // console.log(response.errors.name); //inline error display
                        $('#addStudentModal').modal('hide');
                        $('#addStudentModal').find('input').val("");
                        fetchData();
                    }
                })
            });
        });
    </script>
@endsection
@endsection
