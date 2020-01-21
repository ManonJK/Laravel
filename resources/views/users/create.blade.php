@extends('layouts.app')

@section('title', 'Create user')

@section('content')

    <form method="post" class="form" action="{{route('users.store')}}">
        @csrf
        <div class="form-group">
            <label for="firstname">Prénom :</label>
            <input type="text" class="form-control" name="firstname"/>
        </div>
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="biography">Biography :</label>
            <input type="text" class="form-control" name="biography"/>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection
