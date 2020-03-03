<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateUpdateRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = \App\Post::where('published_at', '<', Carbon::now())->latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCreateUpdateRequest $request)
    {
//        $request->validate([
//           'title'=>'required|min:3|max:30',
//           'body'=>'required|min:6',
//           'published_at'=>'required|date'
//        ]);
//        dd($request->all());
         $data = $request->all();
         $data['author_id'] = Auth::id();
         Post::create($data);

         return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
//        $post=Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogCreateUpdateRequest $request, Post $post)
    {
//        dd($request->all());
        $post->update($request->all());

//        $data = $request->all();
//        $data['author_id'] = Auth::id();
//        Post::create($data);
        return redirect(url('posts', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(url('posts'));
    }
}
