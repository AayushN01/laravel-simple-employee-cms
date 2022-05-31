<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $table = "courses";

    protected $fillable = ['faculty_id','course_name','course_code','status'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
