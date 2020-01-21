@extends('layouts.app')

@section('title', 'Index User')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nom</td>
                <td>Prénom</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>
                        <form action="{{url('user/' . $user->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-outline-info">Voir la fiche complète</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
