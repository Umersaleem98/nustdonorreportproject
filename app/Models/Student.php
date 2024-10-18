<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'studentss';
    
    protected $fillable = [
        'qalam_id', 
        'name_of_student', 
        'father_profession', 
        'institutions', 
        'city',
        'semester_1', 
        'semester_2', 
        'semester_3', 
        'semester_4', 
        'semester_5', 
        'semester_6', 
        'semester_7', 
        'semester_8', 
        'program', 
        'nust_trust_fund_donor_name', 
        'degree', 
        'year_of_admission', 
        'remarks_status', 
        'donor_id',
        'student_status',
        'images'
    ];

}
