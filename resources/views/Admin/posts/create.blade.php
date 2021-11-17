@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <header><h1>Crea un nuovo post</h1></header>
        </div>
        <section id="post-form">
            <form action="{{route('admin.posts.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input class="form-control" type="text" placeholder="Inserisci il titolo" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="author">Autore</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'autore" id="author" name="author">
                </div>
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea class="form-control" type="text" placeholder="Inserisci il contenuto" id="content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <textarea class="form-control" type="text" placeholder="Inserisci l'Url" id="url" name="url"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Crea</button>
            </form>
        </section>
    </div>
@endsection