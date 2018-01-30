@extends('templates/structure')

@section('title')
Boissons
@endsection

@section('TitlePageName')
Liste des Boissons
@endsection

@section('content')
<div class="row tableau table-responsive">
    <table class="table table-hover table-bordered table-boissons col-sm-12">
        <tr>                
            <th>NAME</th>                
            <th>EDIT</th>
        </tr>
        @foreach ($boisson as $uneBoisson)
        <tr>                    
            <td>{{ $uneBoisson->name }} </td>                    
            <td><a href="{{ route('editBoissons', ['id'=>$uneBoisson->id]) }}">Details</a></td>
        </tr>
        @endforeach
    </table>
</div>
<br>
<a href="{{url('addDrink')}}"><button class="btn btn-lg btn-success">Ajouter</button></a>
@endsection



