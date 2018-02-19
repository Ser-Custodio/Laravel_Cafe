@extends('templates.structure')

@section('title')
    Ventes
@endsection
@section('TitlePageName')
    Ventes
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                <h1>Rechercher par:</h1>
                <form action="{{ route('search') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-dark table-responsive search-table">
                        <tr class="table-dark">
                            <th>Boisson</th>
                            <th>Utilisateur</th>
                        </tr>
                        <tr>
                            <td><select name="boisson_id">
                                    <option value="0">Choose Drink</option>
                                    @foreach($boissons as $boisson)
                                        <option value="{{ $boisson->id }}">{{ $boisson->name }}</option>
                                    @endforeach
                                </select>
                                <button name="drinkSearch" class="btnDrink btn btn-md btn-primary"><i
                                            class="fas fa-search"></i></button>
                            </td>
                            <td><select name="user_id">
                                    <option value="0">Choose User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <button name="userSearch" class="btnUser btn btn-md btn-primary"><i
                                            class="fas fa-search"></i></button>
                            </td>
                        </tr>
                    </table>
                </form>
                <a href="{{ route('ventes.index') }}">
                    <button class="btn btn-primary" type="submit">Toutes les Ventes</button>
                </a>
        </div>
        <div class="col-md-offset-1 col-md-5">
            <h1>Recap des Ventes</h1>
            <table class="table table-responsive">
                <tr>
                    <th>Boisson</th>
                    <th>Nombre de Ventes</th>
                    <th>Cash</th>

                </tr>
                @foreach($boissons as $boisson)
                    <tr>
                        <td>{{ $boisson->name }}</td>
                        <td>{{ $boisson->ventes->count() }}</td>
                        <td>{{ number_format($boisson->ventes->sum('price')/100,2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td><strong>TOTAL</strong></td>
                    <td></td>
                    <td><strong>{{ number_format($totalGlobal/100,2) }}</strong></td>
                </tr>
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
                    <td>{{ number_format($sale->price/100,2) }}</td>
                    <td>{{ $sale->user->name }}</td>
                </tr>

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>TOTAL</strong></td>
                <td><strong>{{ number_format($total/100,2) }}</strong></td>
                <td></td>
            </tr>
        </table>
    </div>
    <br>

    {{--@include('templates/buttons')--}}
@endsection

