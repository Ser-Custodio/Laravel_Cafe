@extends('templates/structure')

@section('title')
    Utilisateurs
@endsection

@section('TitlePageName')
    Modifier {{ $user->name }}
@endsection
@section('content')
    <h1>Current Role: {{ $user->role }}</h1>
    <div class="container ">
        <form class="well col-md-offset-2 col-md-8" action="{{ route('users.update', $user->id)}}" method="post">
            {{ csrf_field() }}
            <label class="col-md-4"><b>Role:</b></label>
            <select name="role" class="col-md-6">
                <option>admin</option>
                <option>client</option>
            </select>
            <br><br>
            <button class="btn btn-lg btn-primary" type="submit">Modifier</button>
            <input type="hidden" name="_method" value="put">
        </form>
    </div>
@endsection

