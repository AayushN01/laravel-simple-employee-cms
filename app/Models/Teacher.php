<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";

    protected $fillable = [
        'faculty_id',
        'name',
        'designation',
        'contact_no',
        'status'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
