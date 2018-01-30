@extends('templates/structure')

@section('title')
Boissons
@endsection

@section('TitlePageName')
Liste des Boissons triée
@endsection

@section('content')
<div class="row tableau table-responsive">
            <div>
            <h2>Information: </h2>
            <table class="table table-responsive table-hover table-bordered table-editBoissons col-sm-12">
                <tr>                
                    <th>ID</th> 
                    <th>NAME</th>                
                    <th>PRICE</th>
                </tr>
                @foreach($boisson as $triBoi)
                <tr>                    
                    <td>{{ $triBoi->id }} </td>
                    <td>{{ $triBoi->name }} </td>
                    <td>{{ $triBoi->price }} </td>    
                </tr>
                @endforeach   
            </table>           
        </div
</div>
<br>

@endsection



