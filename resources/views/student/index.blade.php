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
                    {{-- Edit student modal --}}
                    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit % Update Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="">
                                <div class="modal-body">
                                    <input type="hidden" id="edit_student_id">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="name form-control" name="name" id="edit_name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">EMail</label>
                                        <input type="email" class="email form-control" name="email" id="edit_email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Phone</label>
                                        <input type="tel" class="phone form-control" name="phone" id="edit_phone">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Course</label>
                                        <input type="text" class="course form-control" name="course" id="edit_course">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="update_student">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                    {{-- END MODAL --}}
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
            $(document).on('click','.delete_student', function(e){
                e.preventDefault();
                var student_id = $(this).val();
                // alert(student_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url:"student/"+student_id,
                    success: function(response){
                        // console.log(response);
                        fetchData();
                    }
                });
            });
            $(document).on('click', '.edit_student', function(e){
                e.preventDefault();
                var stud_id = $(this).val();
                // console.log(stud_id);
                $('#editStudentModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "student-edit/"+stud_id,
                    success: function(response){
                        // console.log(response.message);
                        if(response.status == 404)
                        {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_name').val(response.message.name);
                            $('#edit_email').val(response.message.email);
                            $('#edit_phone').val(response.message.phone);
                            $('#edit_course').val(response.message.course);
                            $('#edit_student_id').val(stud_id);
                        }
                    }
                })
            });

            $('#update_student').click(function(e){
                var stud_id = $('#edit_student_id').val();
                var data = {
                    'name': $('#edit_name').val(),
                    'email': $('#edit_email').val(),
                    'phone': $('#edit_phone').val(),
                    'course': $('#edit_course').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"PUT",
                    url:"update-student/"+stud_id,
                    data:data,
                    dataType:"json",
                    success:function(response){
                        // console.log(response.message);
                        if(response.status == 400){
                            alert("Failed");
                        }else if(response.status == 404){
                            alert("Student not found");
                        }else{
                            $('#editStudentModal').modal('hide');
                            fetchData();
                        }
                    }
                });
            });

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
