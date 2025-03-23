<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Controllers\Controller;
use App\Models\AttendanceStudents;
use App\Models\Student;
use App\Models\Post;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $attendances = $post->attendances()->with('students')->get();

        return view('post.attendance', compact('attendances', 'post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'mycard_number' => 'required',
            'phone_number' => 'required',
        ]);

        $attendance = Attendance::create([
            'post_id' => $request->post,
            'user_id' => $request->user,
            'full_name' => $request->full_name,
            'mycard_number' => $request->mycard_number,
            'phone_number' => $request->phone_number,
            'adults' => $request->adults,
            'kids' => $request->kids,
        ]);

        $students = $request->input('students');

        foreach ($students as $student) {
            $attendance->students()->attach($student['id'], ['sname' => $student['sname']]);
        }


        return redirect('/home')->with('message', 'You have successfully joined the event!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
