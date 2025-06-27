<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use App\Enums\CourseStatus;
use App\Models\Course;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => ['required', new Enum(CourseStatus::class)],
        ]);

        Course::create($request->only(['name', 'status']));

        return response()->json(['message' => 'Course created successfully']);
    }
}
