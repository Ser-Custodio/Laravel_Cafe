@extends('templates/structure')

@section('title')
    Détails des Utilisateurs
@endsection

@section('TitlePageName')
    {{ $user->name }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Information: </h2>
                <table class="table col-md-6 table-responsive table-hover table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>ROLE</th>
                    </tr>
                    <tr>
                        <td>{{ $user->id }} </td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->role }} </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-sm-5">
                <a href="{{route('users.edit', ['id'=>$user->id])}}">
                    <button class="btn btn-lg btn-success">Modifier</button>
                </a>
            </div>
            <div class="col-sm-5">
                <form method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-lg btn-primary" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
    <br>

@endsection



