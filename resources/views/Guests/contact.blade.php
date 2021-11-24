@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="card p-5 shadow-lg">
                <div class="card-header">
                    <h1>CONTATTACI!</h1>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div> 
                        @endif
                        <form action="{{route('guests.contact.send')}}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input class="form-control " type="text" placeholder="Inserisci il tuo nome" id="name" name="name" value="{{old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="message">Email</label>
                                <input class="form-control" type="email" placeholder="Inserisci la tua email" id="email" name="email" value="{{old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="message">Messaggio</label>
                                <textarea class="form-control" type="text" placeholder="Inserisci il messaggio" id="message" name="message" >{{old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary ">Invia</button>
                        </form>
                       
                        <p><a href="{{route('guests.home')}}">torna alla home</a></p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection