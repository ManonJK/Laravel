@extends('layouts.app')

@section('title', 'User description')

@section('content')
    <div class="d-flex flex-column h-100 justify-content-around">
        <div>ID : {{$user->id}}</div>
        <div>Nom : {{$user->name}}</div>
        <div>Prénom : {{$user->firstname}}</div>
        <div>Email : {{$user->email}}</div>
        <div>Biographie : {{$user->biography}}</div>
        <div>Compétences :
            <ul>
            @foreach($user->skills as $skill)
                <li>{{$skill['name']}}</li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('left')
    <h1>Voici le contact {{$user->firstname}} {{$user->name}}</h1>
@endsection
