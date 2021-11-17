@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Lista dei Post</h1>
            <a class="btn btn-primary my-5" href="">Crea nuovo post</a>
        </header>
        <table class="table">
            <thead>
                <th class="col">Titolo</th>
                <th class="col">Di</th>
                <th class="col">Scritto il</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->date}}</td>
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