@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <a class="btn btn-info" href="{{ route('skills.index',Auth::user()->id) }}">Voir mes compétences</a>
{{--                <div>Compétences:--}}
{{--                    <ul>--}}
{{--                    @foreach(Auth::user()->skills as $skill)--}}
{{--                        <li>{{$skill['name']}}</li>--}}
{{--                    @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
