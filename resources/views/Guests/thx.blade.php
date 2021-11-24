@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="card p-5 shadow-lg">
                <div class="card-header">
                    <h1>Grazie per averci contattato</h1>
                    <p>le risponderemo il rpima possibile..</p>
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
                        
                        <p><a href="{{route('guests.home')}}">torna alla home</a></p>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection