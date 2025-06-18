<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        // لازم تتأكد أن IDs الدول والكورسات موجودة
        // هنا نفترض الدول موجودة من 1 لـ 5
        // والكورسات موجودة من 1 لـ 5

        $students = [
            [
                'name' => 'Ahmad Hasan',
                'email' => 'ahmad@example.com',
                'country_id' => 1,
                'date_of_birth' => '2000-05-15',
                'course_ids' => [1, 2]
            ],
            [
                'name' => 'Sara Ali',
                'email' => 'sara@example.com',
                'country_id' => 2,
                'date_of_birth' => '1998-12-01',
                'course_ids' => [3, 4, 5]
            ],
            [
                'name' => 'Omar Saleh',
                'email' => 'omar@example.com',
                'country_id' => 3,
                'date_of_birth' => '1995-07-22',
                'course_ids' => [2, 5]
            ],
        ];

        foreach ($students as $data) {
            $student = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'country_id' => $data['country_id'],
                'date_of_birth' => $data['date_of_birth'],
            ]);

            $student->courses()->attach($data['course_ids']);
        }
    }
}
