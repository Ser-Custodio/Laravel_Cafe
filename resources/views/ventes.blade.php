@extends('templates/structure')

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
            </tr>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale["NumVente"] }}</td>
                    <td>{{ $sale["Date"] }}</td>
                    <td>{{ $sale["Boisson"] }}</td>
                    <td>{{ $sale["Sucre"] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <br>
    @include('templates/buttons')
@endsection

