<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     * Record main page
     */
    public function index()
    {
        // $data = Record::all();
        $students = Student::where('user_id', auth()->id())->get();

        return view('records', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $student = Student::where('id', $id)->first();
        $record = Record::where('id', $id)->first();

        return view('record.create', ['record' => $record], compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'attendance' => 'required',
            'sleepwell' => 'required',
            'takebath' => 'required',
            'brushteeth' => 'required',
            'healthcondition' => 'required',
        ]);

        Record::create([
            'student_id' => $request->student,
            'date' => today(),
            'attendance' => $request->input('attendance'),
            'dropoff_time' => now(),
            'sleepwell' => $request->input('sleepwell'),
            'takebath' => $request->input('takebath'),
            'brushteeth' => $request->input('brushteeth'),
            'healthcondition' => $request->input('healthcondition'),
            'last_updated_at' => now(),
        ]);

        /** Message */
        return redirect('records')
            ->with('message', 'Your record has been updated for today!');
    }

    /**
     * Display the specified resource.
     */
    public function show($studentId)
    {
        $records = Record::where('student_id', $studentId)->get();
        $student = Student::find($studentId);

        return view('record.show', compact('records', 'student'));
        // pass one record & grab it from record model where the id is id in records table

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('record.edit')
            ->with('record', Record::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Record::where('id', $id)
            ->update([
                'pickup_time' => now(),
                'pickup_time_updated' => true,

            ]);
        /** Message */
        return redirect('records')
            ->with('message', 'Pick up time has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record = Record::where('id', $id);
        $record->delete();

        return redirect('/record')
            ->with('message', 'Your record has been deleted!');
    }
}
