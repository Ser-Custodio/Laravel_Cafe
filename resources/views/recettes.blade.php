@extends('templates/structure')

@section('title')
    Recettes
@endsection

@section('TitlePageName')
    Liste des recettes
@endsection

@section('content')
    <div class="row tableau tableRecette table-responsive">
        <table class="table table-hover table-bordered col-sm-2">
            <tr>
                <th>Nom boisson</th>
                <th>Ingrédient</th>
                <th>Dose</th>
            </tr>
            @foreach ($recettes as $boisson => $ingre)
                @foreach ($ingre as $name => $qtt)
                    <tr>
                        <td>{{ $boisson }}</td>
                        <td>{{ $name }}</td>
                        <td>{{ $qtt }}</td>
                @endforeach
                    </tr>
            @endforeach
        </table>
    </div>
    <br>
    @include('templates/buttons')
@endsection
