@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{session('alert-message')}}
            </div>
        @endif
        <header>
            <h1>Lista dei Post</h1>
            <a class="btn btn-primary my-5" href="{{route('admin.posts.create')}}">Crea nuovo post</a>
        </header>
        <table class="table">
            <thead>
                <th class="col">Titolo</th>
                <th class="col">Categoria</th>
                <th class="col">Tags</th>
                <th class="col">Di</th>
                <th class="col">Scritto il</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></td>
                        <td>@if ($post->category) {{$post->category->name}} @else Nessuna categoria assegnata @endif</td>
                        <td>
                            @forelse ($post->tags as $tag)
                                
                                    <span class="badge badge-pill" style="background-color: {{$tag->color}}">{{$tag->name}}</span>
                                
                            @empty
                                nessun tag
                            @endforelse
                        </td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->date}}</td>
                        <td><a href="{{route('admin.posts.edit', $post)}}" class="btn btn-secondary">Modifica</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy',$post)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Non ci sono post da visulizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection