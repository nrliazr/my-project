<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::where('user_id', auth()->id())->get();

        return view('fees', ['students' => $students]);
    }

    public function payAll(Request $request, $user_id)
    {
        // Get all students associated with the given user ID
        $students = Student::where('user_id', $user_id)->get();

        // Calculate total amount
        $totalAmount = $students->count() * 25; // assuming 25 is the fee amount for each student per month

        // Calculate month names
        $months = [];
        for ($month = 1; $month <= 12; $month++) {
            $months[] = Carbon::create(now()->year, $month, 10)->format('F');
        }

        return view('fee.pay-all', compact('students', 'user_id', 'months', 'totalAmount'));
    }

    public function payAllConfirm(Request $request)
    {
        $selectedMonth = $request->input('selected_month');
        $paymentMethod = $request->input('payment_method');
        $totalAmount = 0;

        // Get all students associated with the given user ID
        $students = Student::where('user_id', $request->user_id)->get();

        // Calculate total amount to pay for all students
        foreach ($students as $student) {
            $fee = Fee::where('student_id', $student->id)
                ->where('month', $selectedMonth)
                ->first();

            if (!$fee) {
                $fee = new Fee();
                $fee->student_id = $student->id;
                $fee->month = $selectedMonth;
                $fee->year = now()->year;
                $fee->total_amount = 25.00;
                $fee->status = 'Due';
                $fee->save();
            }

            $totalAmount += $fee->total_amount;
        }

        // Update total amount in the request
        $request->merge(['total_amount' => $totalAmount]);

        // Validate the request
        $request->validate([
            'total_amount' => 'required',
            'payment_method' => 'required',
        ]);

        // Update all students' fee status
        foreach ($students as $student) {
            $fee = Fee::where('student_id', $student->id)
                ->where('month', $selectedMonth)
                ->first();

            $fee->paid_amount = $fee->total_amount;
            $fee->status = 'Paid';
            $fee->payment_date = today();
            $fee->payment_method = $paymentMethod;
            $fee->save();
        }

        return redirect()->route('fees')->with('message', 'Payment successful for all child!');
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
            'selected_month' => 'required',
            'total_amount' => 'required',
            'payment_method' => 'required',
        ]);

        $student = Student::find($request->input('student'));
        $selectedMonth = $request->input('selected_month');
        $totalAmount = $request->input('total_amount');
        $paymentMethod = $request->input('payment_method');

        $fee = Fee::firstOrCreate([
            'student_id' => $student->id,
            'month' => $selectedMonth,
            'year' => now()->year,
        ]);

        $fee->paid_amount = $totalAmount;
        $fee->status = $totalAmount ? 'Paid' : 'Due';
        $fee->payment_date = today();
        $fee->payment_method = $paymentMethod;
        $fee->save();

        return redirect('fees')
            ->with('message', 'Payment successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show($studentId)
    {
        $student = Student::find($studentId);
        $fees = [];

        for ($month = 1; $month <= 12; $month++) {
            $fee = Fee::firstOrNew([
                'student_id' => $student->id,
                'month' => $month,
                'year' => now()->year,
            ]);

            if (!$fee->exists) {
                $fee->total_amount = 25.00;
                $fee->status = 'due ' . Carbon::create(now()->year, $month, 10)->format('j M');
                $fee->paid = 0.00;
                $fee->paid_amount = null;
                $fee->payment_date = null;
                $fee->payment_method = null;
            }

            $fees[] = $fee;
        }

        return view('fee.show', compact('fees', 'student'));
    }

    public function pay($id, Request $request)
    {
        $student = Student::where('id', $id)->first();
        $selectedMonth = $request->input('selected_month');
        $fee = Fee::where('student_id', $id)
            ->where('month', $selectedMonth)
            ->first();

        $total_amount = 25;

        return view('fee.pay', compact('fee', 'student', 'selectedMonth', 'total_amount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
