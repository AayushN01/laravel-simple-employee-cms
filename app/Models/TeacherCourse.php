<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    use HasFactory;
    protected $table = "teacher_courses";

    protected $fillable = ['teacher_id','course_id'];

    public function teacher()
    {
        $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function course()
    {
        $this->belongsTo(Course::class,'course_id');
    }
}
