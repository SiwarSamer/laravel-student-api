<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email|max:255',
        'country_id' => 'required|exists:countries,id',
        'date_of_birth' => 'required|date',
        'phone' => 'required|digits:10'
    
    ]);

    $student = Student::create($validated); 

    if ($request->has('course_ids')) {
        $student->courses()->attach($request->input('course_ids'));
    }

    return new StudentResource($student);
}
public function index()
{
    $students = Student::with(['country', 'courses'])->get();  
    return StudentResource::collection($students);  
}

public function show($id)
{
    $student = Student::with(['country', 'courses'])->findOrFail($id);
    return new StudentResource($student);
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:students,email,'.$id,
        'country_id' => 'required|exists:countries,id',
        'phone' => 'required',
    ]);

    $student->update($validated);

    return response()->json(['message' => 'Student updated successfully', 'student' => $student]);
}
public function destroy($id){
    $student=Student::findOrFail($id);
    $student->delete();
    return response()->json(['messages'=>'Student deleted successfully']);
}



}
