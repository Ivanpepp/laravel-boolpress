@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Lista dei Post</h1>
            <a class="btn btn-primary" href="">Crea nuovo post</a>
        </header>
        <table class="table">
            <thead>
                <th class="col">Titolo</th>
            <th class="col">Di</th>
            <th class="col">Scritto il</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <td>{{$post->title}}</td>
                    <td>{{$post->author}}</td>
                    <td>{{$post->date}}</td>
                @empty
                    <tr>
                        <td colspan="3">Non ci sono post da visulizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection