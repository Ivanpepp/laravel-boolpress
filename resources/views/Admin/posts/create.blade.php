@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <header><h1>Crea un nuovo post</h1></header>
        </div>
        <section id="post-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div> 
            @endif
            
            <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input class="form-control" type="text" placeholder="Inserisci il titolo" id="title" name="title" value="{{old('title', $post->title)}}">
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" id="category_id">
                        <option value="{{null}}">Senza Categoria</option>
                        @foreach ($categories as $category)
                            <option @if (old('category_id')==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
               <div class="form-group">
                    <div class="form-check form-check-inline">
                        <legend class="h5 mb-5">Tags</legend>
                        @foreach ($tags as $tag)
                            <input class="form-check-input mt-5" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]" >
                            <label class="form-check-label mx-2 pt-5" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                        @endforeach       
                    </div>
               </div>
                <div class="form-group">
                    <label for="author">Autore</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'autore" id="author" name="author" value="{{old('author', $post->author)}}">
                </div>
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea class="form-control" type="text" placeholder="Inserisci il contenuto" id="content" name="content" > {{old('content',$post->content)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input class="form-control" type="file"  id="url" name="url" value="{{old('url',$post->url)}}">
                </div>
                
                <button class="btn btn-primary" type="submit">Crea</button>
            </form>
        </section>
    </div>
@endsection