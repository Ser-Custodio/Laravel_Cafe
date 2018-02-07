@extends('templates.structure')

@section('title')
    Ventes
@endsection

@section('TitlePageName')
    Liste des ventes
@endsection

@section('content')
    <div class="row tableau tableauVentes table-responsive">
        <table class="table table-hover table-bordered col-sm-2">
            <tr>
                <th>Numéro Vente</th>
                <th>Date - Heure</th>
                <th>Boisson</th>
                <th>Sucre</th>
                <th>User</th>
            </tr>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->boisson->name }}</td>
                    <td>{{ $sale->nbSugar }}</td>
                    <td>Username</td>
                </tr>
            @endforeach
        </table>
    </div>
    <br>
    @include('templates/buttons')
@endsection

