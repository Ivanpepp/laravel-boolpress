<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage; 
use App\User;
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
        $posts= Post::paginate(5);
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
        $tags = Tag::all();
        return view('admin.posts.create' ,compact('post','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        //
        request()->validate([
            'title' => ['required','string','max:120',
                        Rule::unique('posts')
                        ->ignore($post->id)],
            'author' => 'required|max:120',
            'content' => 'required|min:10',
            'url' => 'required|min:10',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'url' => 'image'
        ],
        [
            'required'=>'Devi compilare correttaemnte :attribute',
            'title.required' => 'non è possibile inserire un post senza titolo',
            'author.max' => 'non è possibile inserire un autore con più di 160 caratteri',
            'content.min' => 'il post deve essere lungo almeno 10 caratteri',
            'url.min' => 'il post deve essere lungo almeno 10 caratteri',
        ]
    );

        $data = request()->all();
        $data['date']=Carbon::now();

        $data['url'] = Storage::put('posts/images',$data['url']);

        $post= new Post();

        $post->fill($data);
        $post->slug = Str::slug($post->title,'-');

        $post->save();

        if(array_key_exists('tags', $data)) $post->tags()->sync($data['tags']);
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

        $categories = Category::all();
        $tags = Tag::all();
        $tagIds = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post','categories','tags','tagIds'));
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
        request()->validate([
            'title' => ['required','string','max:120',
                        Rule::unique('posts')
                        ->ignore($post->id)],
            'author' => 'required|max:120',
            'content' => 'required|min:10',
            'url' => 'required|min:10',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'url' => 'image',
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
       
        $data['url'] = Storage::put('posts/images',$data['url']);


        $post->fill($data);
        $post->slug = Str::slug($post->title,'-');

        $post->update();
        if(array_key_exists('tags', $data)) $post->tags()->sync($data['tags']);

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
        if($post->tags){
            $post->tags()->detach();
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', $post->title)->with('alert-message',"$post->title è stato eliminato con successo!");
    }
}
