@extends('templates/structure')

@section('title')
    Boissons
@endsection

@section('TitlePageName')
    Liste des Boissons
@endsection

@section('content')
    <div class="row table-responsive">
        <table class="table table-hover table-bordered">
            <tr>
                <th class="col-md-2">NAME <a href="{{ route('triDrinks') }}"><i class="fas fa-sort"></i></a></th>
                <th class="col-md-2">PRICE (€) <a href="{{ route('triPrix') }}"><i class="fas fa-sort"></i></a></th>
                <th class="col-md-1">STATUS</th>
                <th class="col-md-2">EDIT</th>
            </tr>
            @foreach ($boisson as $uneBoisson)
                    <tr>
                        <td class="col-md-2">{{ $uneBoisson->name }} </td>
                        <td class="col-md-2">{{ number_format($uneBoisson->price/100,2) }}</td>
                        <td class="col-md-1">@if ($uneBoisson->active === 1) Active @else Inactive @endif</td>
                        <td class="col-md-2"><a href="{{ route('editBoissons', ['id'=>$uneBoisson->id]) }}">Details</a></td>
                    </tr>
            @endforeach
        </table>
    </div>
    <br>
    <a href="{{url('addDrink')}}">
        <button class="btn btn-lg btn-success">Ajouter</button>
    </a>
@endsection



