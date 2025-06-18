<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        $courses = ['Mathematics', 'Physics', 'Chemistry', 'Biology', 'Computer Science'];

        foreach ($courses as $course) {
            Course::create(['name' => $course]);
        }
    }
}
