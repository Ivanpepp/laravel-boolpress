<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\ViewServiceProvider;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create' ,compact('post','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'title' => 'required|unique:posts|max:120',
            'author' => 'required|max:120',
            'content' => 'required|min:10',
            'url' => 'required|min:10',
            'category_id' => 'nullable',
        ],
        [
            'required'=>'Devi compilare correttaemnte :attribute',
            'title.required' => 'non è possibile inserire un post senza titolo',
            'author.max' => 'non è possibile inserire un autore con più di 160 caratteri',
            'content.min' => 'il post deve essere lungo almeno 10 caratteri',
        ]
    );

        $data = request()->all();
        $data['date']=Carbon::now();
        $post= new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title,'-');

        $post->save();
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        $data = request()->all();
        $data['date']=Carbon::now();
       
        $post->fill($data);
        $post->slug = Str::slug($post->title,'-');

        $post->update();
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', $post->title)->with('alert-message',"$post->title è stato eliminato con successo!");
    }
}
