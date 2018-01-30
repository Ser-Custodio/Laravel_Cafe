@extends('templates/structure')

@section('title')
    Ingrédients
@endsection

@section('TitlePageName')
    Liste des ingrédients
@endsection

@section('content')
    <div class="row tableau table-responsive">
        <table class="table table-hover table-bordered col-sm-12">
            <tr>
                <th>NAME</th>
                <th>EDIT</th>
            </tr>
            @foreach ($ingredient as $unIngredient)
            <tr>
                <td>{{ $unIngredient->name }}</td>
                <td><a href="{{ route('ingredients.show', $unIngredient->id) }}">Details</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
    <a href="{{route('ingredients.create')}}">
        <button class="btn btn-lg btn-success">Ajouter</button>
    </a>
@endsection