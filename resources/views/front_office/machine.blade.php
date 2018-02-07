@extends('templates/structure')

@section('title')
    Machine à Café
@endsection

@section('TitlePageName')
    Choisissez votre Boisson
@endsection

@section('content')
    <div class='displays formula'>
        <form method="post" action="{{ route('ventes.store') }}">
            {{ csrf_field() }}
            Available Drink: <br>
            <div class="row tableau table-responsive">
                    <table class="table  table-hover table-bordered table-editBoissons col-sm-12">
                        <tr>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>CHOIX</th>
                        </tr>
                        @foreach ($boisson as $uneBoisson)
                            <tr>
                                <td>{{ $uneBoisson->name }} </td>
                                <td>{{ number_format($uneBoisson->price/100,2) }}€</td>
                                <td><input type="radio" name="drink" value="{{ $uneBoisson->id }}"></td>
                            </tr>
                        @endforeach
                    </table>
            </div>
            <br>
            Number of Sugar:<br>
            <table class="table tableSugar">
                <tr>
                    <th>0</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </tr>
                <tr>
                    <td><input type="radio" name="nbSugar" value="0"></td>
                    <td><input type="radio" name="nbSugar" value="1"></td>
                    <td><input type="radio" name="nbSugar" value="2"></td>
                    <td><input type="radio" name="nbSugar" value="3"></td>
                    <td><input type="radio" name="nbSugar" value="4"></td>
                    <td><input type="radio" name="nbSugar" value="5"></td>
                </tr>
            </table>
            <br><button class='btn btn-lg btn-success' type="submit">Commander</button>
        </form>
    </div>
@endsection
