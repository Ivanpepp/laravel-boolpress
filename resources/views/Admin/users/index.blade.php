@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{session('alert-message')}}
            </div>
        @endif
        <header>
            <h1>Utenti Registrati</h1>
            <a class="btn btn-primary my-5" href="{{route('admin.users.create')}}">Crea nuovo utente</a>
        </header>
        <table class="table">
            <thead>
                <th class="col-1">ID</th>
                <th class="col-3">Nome</th>
                <th class="col-4">Email</th>
                <th class="col-4">ruoli</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td><a href="{{route('admin.users.show', $user)}}">{{$user->id}}</a></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td></td>
                        <td><a href="{{route('admin.users.edit', $user)}}" class="btn btn-secondary">Modifica</a></td>
                        <td>
                            <form action="{{route('admin.users.destroy',$user)}}" method="user">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Non ci sono user da visulizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection