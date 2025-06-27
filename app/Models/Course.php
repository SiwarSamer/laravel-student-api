<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\CourseStatus;

class Course extends Model
{    
    use HasFactory, SoftDeletes;


    protected $fillable = ['name', 'status'];

    protected $casts = [
    'status' => CourseStatus::class,
    ];
}
