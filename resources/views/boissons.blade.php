@extends('templates/structure')

@section('title')
Boissons
@endsection

@section('TitlePageName')
Liste des Boissons
@endsection

@section('content')
<div class="row table-responsive">
    <table class="table table-hover table-bordered col-sm-12">
        <tr>
            <th>NAME <a href="{{ route('triDrinks') }}" ><i class="fas fa-sort"></i></a></th>
            <th>PRICE (€) <a href="{{ route('triPrix') }}" ><i class="fas fa-sort"></i></a></th>
            <th>EDIT</th>
        </tr>
        @foreach ($boisson as $uneBoisson)
        <tr>                    
            <td>{{ $uneBoisson->name }} </td>
            <td>{{ number_format($uneBoisson->price/100,2) }}</td>
            <td><a href="{{ route('editBoissons', ['id'=>$uneBoisson->id]) }}">Details</a></td>
        </tr>
        @endforeach
    </table>
</div>
<br>
<a href="{{url('addDrink')}}"><button class="btn btn-lg btn-success">Ajouter</button></a>
@endsection



