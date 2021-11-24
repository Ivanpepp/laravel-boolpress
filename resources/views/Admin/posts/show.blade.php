@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card mb-3">
            <img src="{{$post->getImageUrl() . $post->url}}" class="card-img-top" alt="{{$post->title}}" height="300px">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text">Scritto da: {{$post->author}}</p>
                <address>@if ($post->category)Categoria:  {{$post->category->name}} @else Nessuna categoria assegnata @endif</address>
                <p class="card-text">il: {{$post->date}}</p>
                <a href="{{route('admin.posts.index')}}" class="btn btn-danger">Torna alla lista</a>
                <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-secondary">Modifica</a>
            </div>
          </div>
    </div>
</div>
@endsection