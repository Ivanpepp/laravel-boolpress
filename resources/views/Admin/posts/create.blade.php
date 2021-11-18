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
            
            <form action="{{route('admin.posts.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input class="form-control" type="text" placeholder="Inserisci il titolo" id="title" name="title" value="{{old('title', $post->title)}}">
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" id="category_id">
                        <option< value="">Senza Categoria</option>
                        @foreach ($categories as $category)
                            <option @if (old('category_id')==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
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
                    <textarea class="form-control" type="text" placeholder="Inserisci l'Url" id="url" name="url" >{{old('url',$post->url)}}</textarea>
                </div>
                
                <button class="btn btn-primary" type="submit">Crea</button>
            </form>
        </section>
    </div>
@endsection