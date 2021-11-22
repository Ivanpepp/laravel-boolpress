@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card mb-3">
            
            <div class="card-body">
                <h2 class="card-title">ID: {{$user->id}}</h2>
                <p class="card-text"><strong>Nome Utente:</strong> {{$user->name}}</p>
                <p class="card-text"><strong>Email:</strong> {{$user->email}}</p>
                <a href="{{route('admin.users.index')}}" class="btn btn-danger">Torna alla lista</a>
                <a href="{{route('admin.users.edit', $user)}}" class="btn btn-secondary">Modifica</a>
            </div>
          </div>
    </div>
</div>
@endsection