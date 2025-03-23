<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * Record main page
     */
    public function index()
    {
        // $data = Post::all();
        return view('admin.reports', ['reports' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $post = Post::where('id', $id)->first();
        $report = Post::where('id', $id)->first();

        return view('report.create', ['report' => $report], compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);

        Report::create([
            'post_id' => $request->post,
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'description' => $request->input('description'),
        ]);
        /** Message */
        return redirect('/admin/reports')
            ->with('message', 'Your report has been created!');
    }

    public function show($postId)
    {
        $post = Post::where('id', $postId)->first();
        $report = Report::where('post_id', $postId)->first();

        return view('report.show')
            ->with('post', $post)
            ->with('report', $report);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('report.edit')
            ->with('report', Report::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);

        Report::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'location' => $request->input('location'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'description' => $request->input('description'),
            ]);
        /** Message */
        return redirect('/admin/reports')
            ->with('message', 'Your report has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Post::where('id', $id);
        $report->delete();

        return redirect('/admin/reports')
            ->with('message', 'Your report has been deleted!');
    }
}
