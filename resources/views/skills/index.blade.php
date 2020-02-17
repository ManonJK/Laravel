@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                @if(Auth::user()->isAdministrator())
                    <h2>Compétences des utilisateurs</h2>
                @else
                    <h2>Mes compétences</h2>
                @endif

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('skills.create') }}"> Create New skill</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Level</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach (Auth::user()->skills as $skill)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->pivot['level'] }}</td>
                <td>{{ $skill->description }}</td>
                <td>
                    <form action="{{ route('skill_user.destroy',$skill_user->skill_id, $skill_user->user_id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('skills.show',$skill->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('skills.edit',$skill->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

{{--    {!! $skill_user->links() !!}--}}

@endsection
