<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Record;
use App\Models\Student;
use App\Models\Fee;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    public function fees(Request $request)
    {
        // Get filter and search values from the request
        $year = $request->input('year');
        $search = $request->input('search');

        // Define an array of years
        $years = range(2020, 2024);

        // Query the students table with filter and search conditions
        $students = Student::query();

        if (!empty($year) && $year !== '') {
            $students->where('class_of', $year);
        }

        if ($search !== '') {
            $students->where(function ($query) use ($search) {
                $query->where('mykid_number', 'like', '%' . $search . '%')
                    ->orWhere('sname', 'like', '%' . $search . '%');
            });
        }

        // Fetch the students data
        $students = $students->get();

        // Pass the data to the view
        return view('admin.fees', [
            'students' => $students,
            'years' => $years,
        ]);
    }

    public function records(Request $request)
    {
        // Get filter and search values from the request
        $year = $request->input('year');
        $search = $request->input('search');

        // Define an array of years
        $years = range(2020, 2024);

        // Query the students table with filter and search conditions
        $students = Student::query();

        if (!empty($year) && $year !== '') {
            $students->where('class_of', $year);
        }

        if ($search !== '') {
            $students->where(function ($query) use ($search) {
                $query->where('mykid_number', 'like', '%' . $search . '%')
                    ->orWhere('sname', 'like', '%' . $search . '%');
            });
        }

        // Fetch the students data
        $students = $students->get();

        // Pass the data to the view
        return view('admin.records', [
            'students' => $students,
            'years' => $years,
        ]);
    }

    public function reports()
    {
        return view('admin.reports')->with('reports', Post::all());
    }
}
