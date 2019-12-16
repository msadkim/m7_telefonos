<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all();
        $posts = Post::paginate(15);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titol' => 'required|unique:posts|max:190',
            'contingut' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        // Constructor estil JAVA anys 90
        $post = new Post();
        $post->titol = $request->get('titol');
        $post->contingut = $request->get('contingut');
        $post->user_id = $request->get('user_id');
        $post->save();

        /*
         * Constructor estil PHP
         *
         * $post = new Post([
         * 'titol'=> $request->get('titol'),
         * 'contingut' => $request->get('contingut'),
         * 'user_id' => $request->get('user_id'),
         * ]);
         */

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        return view('posts.show', compact('post'));
        return view('posts.show', ['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);
        $post->titol = $request->get('titol');
        $post->contingut = $request->get('contingut');
        $post->user_id = $request->get('user_id');
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);
        return redirect('/posts');
    }
}
