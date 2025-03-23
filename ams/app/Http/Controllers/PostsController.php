<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Student;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

// use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);
        /** Message */
        return redirect('/admin/home')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     * the param here is grabbed from the url
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        $attendance = Attendance::where('post_id', $post->id)->where('user_id', Auth::id())->first();

        return response()->view('post.show', compact('post', 'attendance'));
    }

    public function join($id)
    {
        $user = auth()->user();
        $post = Post::where('id', $id)->first();
        $students = Student::where('user_id', auth()->user()->id)->select('id', 'sname')->get();

        return view('post.join', compact('post', 'students', 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('post.edit')
            ->with('post', Post::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $lug
     * @return \Illuminate\Http\Response
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

        Post::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'location' => $request->input('location'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'description' => $request->input('description'),
            ]);
        /** Message */
        return redirect('/admin/home')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id);
        $post->delete();

        return redirect('/post')
            ->with('message', 'Your post has been deleted!');
    }
}
