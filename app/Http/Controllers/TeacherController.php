<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\TeacherCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $teachers = Teacher::orderBy('created_at','DESC')->get();
        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $faculties = Faculty::where('status','Active')->get();
        return view('teacher.create',compact('faculties'));
    }

    public function getCourse(Request $request)
    {
        $faculty_id = $request->faculty_id;
        $course = Course::where('faculty_id',$faculty_id)->where('status','Active')->get();
        // dd($course);
        return response()->json(['status'=>200,'message'=>$course]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'name' => $request->name,
            'designation' => $request->designation,
            'contact_no' => $request->contact_no,
            'faculty_id' => $request->faculty_id,
            'status' => $request->status
        ];

        $teacher = Teacher::create($input);

        $courses = $request->course_id;
        if(!empty($courses)){
            foreach($courses as $key => $course){
                $course_data = [
                    'teacher_id' => $teacher->id,
                    'course_id' => $course,
                ];
            TeacherCourse::create($course_data);
            }
        }
        return redirect()->route('teacher.index')->with('success','Teacher has been added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $faculties = Faculty::where('status','Active')->get();
        $teacher_courses = TeacherCourse::where('teacher_id',$teacher->id)->get();
        return view('teacher.edit',compact('teacher','teacher_courses','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->faculty_id = $request->faculty_id;
        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->contact_no = $request->contact_no;
        $teacher->status = $request->status;
        $teacher->save();
        
        $courses = $request->course_id;
        if(!empty($courses)){
            foreach($courses as $key => $course){
                $course_data = [
                    'teacher_id' => $teacher->id,
                    'course_id' => $course,
                ];
                if(!empty($courses)){
                    $existing_course = TeacherCourse::find($courses);
                    if($existing_course)
                    {
                        $existing_course->update($course_data);
                    } else {
                        TeacherCourse::create($course_data);
                    }
                }
            }
            
        }
        return redirect()->route('teacher.index')->with('success','Teacher has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->back()->with('success','Teacher has been deleted successfully!');
    }
}
