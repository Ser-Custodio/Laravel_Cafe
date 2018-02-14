@extends('templates.structure')

@section('title')
    Ventes
@endsection

@section('TitlePageName')
    Ventes
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')

                <h1>Rechercher par:</h1>
                <table class="table table-dark table-responsive search-table">
                    <tr class="table-dark">
                        <th>Boisson</th>
                        <th>Date</th>
                        <th>User</th>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Nom Boisson" autofocus>
                            <button class="btn btn-md btn-primary"><i class="fas fa-search"></i></button>
                        </td>
                        <td><input type="text" placeholder="Date de Vente" autofocus>
                            <button class="btn btn-md btn-primary"><i class="fas fa-search"></i></button>
                        </td>
                        <td><input type="text" placeholder="Nom Utilisateur" autofocus>
                            <button class="btn btn-md btn-primary"><i class="fas fa-search"></i></button>
                        </td>
                    </tr>
                </table>

        </div>

        <div class="col-md-offset-1 col-md-5">
            <h1>Recap des Ventes</h1>
            <table class="table table-dark table-responsive search-table">
                <tr class="table-dark">
                    <th>Boisson</th>
                    <th>Nombre de Ventes</th>
                </tr>
                @foreach($boissons as $boisson)
                    <tr>
                        <td>{{ $boisson->name }}</td>
                        <td>{{ $boisson->ventes->count() }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        @endif
    </div>
    <h1>Liste des ventes</h1>
    <div class="row tableau tableauSales table-responsive">
        <table class="table table-hover col-sm-2">
            <tr>
                <th class="col-md-2">Numéro Vente</th>
                <th class="col-md-2">Date - Heure</th>
                <th class="col-md-2">Boisson</th>
                <th class="col-md-2">Sucre</th>
                <th class="col-md-2">Prix</th>
                <th class="col-md-2">User</th>
            </tr>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->boisson->name }}</td>
                    <td>{{ $sale->nbSugar }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->user->name }}</td>
                </tr>

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>TOTAL</td>
                <td>{{ $total }}</td>
                <td></td>
            </tr>
        </table>
    </div>
    <br>
    {{--@include('templates/buttons')--}}
@endsection

