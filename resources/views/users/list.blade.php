@extends('templates/structure')

@section('title')
    Utilisateurs
@endsection

@section('TitlePageName')
    Liste des utilisateurs
@endsection

@section('content')

    <div class="row table-responsive">
        <table class="table table-hover table-bordered col-sm-12">
            <tr>
                <th>NAME</th>
                <th>ROLE</th>
                <th>DETAILS</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td><a href="{{ route('users.show', $user->id) }}">Details</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <br>
@endsection