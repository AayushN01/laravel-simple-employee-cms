<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employees';

    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'address',
        'gender',
        'dob',
        'designation',
        'photo',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
