@extends('templates/structure')

@section('title')
Machine à Café
@endsection

@section('TitlePageName')
Choisissez votre Boisson
@endsection

@section('content')
<div class='displays formula'>
    <form class="col-md-offset-2 col-md-8" method="post" action="{{ route('ventes.store') }}">
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
                @if($uneBoisson->dispo === true && $uneBoisson->active === 1)
                <tr>
                    <td>{{ $uneBoisson->name }} </td>
                    <td>{{ number_format($uneBoisson->price/100,2) }}€</td>
                    <td><input type="radio" name="drink" value="{{ $uneBoisson->id }}"></td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
        <br>
        Number of Sugar:<br>
        <div class="table-responsive">
            <table class="table tableSugar">
                <tr>
                    @for($i =0; $i <= $nbSugar && $i < 6; $i++)
                    <th class="col-md-2">{{ $i }}</th>
                    @endfor
                </tr>
                <tr>
                    @for($i =0; $i <= $nbSugar && $i < 6; $i++)
                    <td class="col-md-2"><input type="radio" name="nbSugar" value={{$i}}>
                    </td>
                    @endfor
                </tr>
            </table>
        </div>
        <br>
        <button class='btn btn-lg btn-success' type="submit">Commander</button>
    </form>
</div>
@endsection
