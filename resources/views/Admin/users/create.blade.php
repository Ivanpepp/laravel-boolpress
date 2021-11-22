@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <header><h1>Crea un nuovo user</h1></header>
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
            
            <form action="{{route('admin.users.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input class="form-control" type="text" placeholder="Inserisci il titolo" id="title" name="title" value="{{old('title', $user->title)}}">
                </div>
                <div class="form-group">
                    <label for="author">Autore</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'autore" id="author" name="author" value="{{old('author', $user->author)}}">
                </div>
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea class="form-control" type="text" placeholder="Inserisci il contenuto" id="content" name="content" > {{old('content',$user->content)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <textarea class="form-control" type="text" placeholder="Inserisci l'Url" id="url" name="url" >{{old('url',$user->url)}}</textarea>
                </div>
                
                <button class="btn btn-primary" type="submit">Crea</button>
            </form>
        </section>
    </div>
@endsection