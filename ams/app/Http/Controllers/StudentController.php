<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getStudentsByUser($user_id)
    {
        $students = Student::where('user_id', $user_id)->select('id', 'sname')->get();

        return response()->json($students);
    }

    /**
     * Display a listing of students by year.
     */
    public function getStudentsByYear($year)
    {
        $students = Student::whereYear('created_at', $year)->get();
        return view('students.list', compact('students'));
    }
}
