@extends('templates/structure')

@section('title')
    Machine à Café
@endsection

@section('TitlePageName')
    Choisissez votre Boisson
@endsection

@section('content')
    <div class='displays formula'>
        <form CLASS="col-md-offset-2 col-md-8" method="post" action="{{ route('ventes.store') }}">
            {{ csrf_field() }}
            Available Drink: <br>
            <div class="row table-responsive">
                    <table class="table table-editBoissons table-hover table-bordered col-sm-12">
                        <tr>
                            <th class="col-md-2">NAME</th>
                            <th class="col-md-2">PRICE</th>
                            <th class="col-md-2">CHOIX</th>
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
            <div class="table-responsive">
            <table class="table tableSugar">
                <tr>
                    <th class="col-md-2">0</th>
                    <th class="col-md-2">1</th>
                    <th class="col-md-2">2</th>
                    <th class="col-md-2">3</th>
                    <th class="col-md-2">4</th>
                    <th class="col-md-2">5</th>
                </tr>
                <tr>
                    <td class="col-md-2"><input type="radio" name="nbSugar" value="0"></td>
                    <td class="col-md-2"><input type="radio" name="nbSugar" value="1"></td>
                    <td class="col-md-2"><input type="radio" name="nbSugar" value="2"></td>
                    <td class="col-md-2"><input type="radio" name="nbSugar" value="3"></td>
                    <td class="col-md-2"><input type="radio" name="nbSugar" value="4"></td>
                    <td class="col-md-2"><input type="radio" name="nbSugar" value="5"></td>
                </tr>
            </table>
            </div>
            <br><button class='btn btn-lg btn-success' type="submit">Commander</button>
        </form>
    </div>
@endsection
