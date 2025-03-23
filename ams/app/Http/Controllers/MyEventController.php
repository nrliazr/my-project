<?php

namespace App\Http\Controllers;

use App\Models\MyEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $attendances = $user->attendances;

        return view('myevents', compact('attendances'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MyEvent $myEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyEvent $myEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyEvent $myEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyEvent $myEvent)
    {
        //
    }
}
