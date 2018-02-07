@extends('templates/structure')

@section('title')
Edit-Boissons
@endsection

@section('TitlePageName')
{{ $boisson->name }}
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <h2>Information: </h2>
            <table class="table table-responsive table-hover table-bordered table-editBoissons col-sm-12">
                <tr>                
                    <th>ID</th> 
                    <th>NAME</th>                
                    <th>PRICE</th>
                </tr>
                <tr>                    
                    <td>{{ $boisson->id }} </td>
                    <td>{{ $boisson->name }} </td>
                    <td>{{ number_format($boisson->price/100,2) }} </td>
                </tr>
            </table>           
        </div>
        <div class="col-sm-offset-2 col-sm-5">
            <h2>Recette: </h2>
            <table class="table table-responsive table-hover table-bordered table-editBoissons col-sm-12">
                <tr>                
                    <th>INGREDIENT</th> 
                    <th>QUANTITY</th>                
                </tr>
                @foreach($recette as $unIng)
                <tr>               
                    <td>{{ $unIng->name }} </td>
                    <td>{{ $unIng->pivot->quantity }} </td>
                </tr>
                @endforeach
            </table>           
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <a href="{{route('modifyDrink', ['id'=>$boisson->id])}}"><button class="btn btn-lg btn-success">Modifier</button></a>  
        </div>
        <div class="visible-xs"><br></div>
        <div class="col-sm-offset-1 col-sm-2">
            <form method="post">
              {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-lg btn-primary" type="submit">Supprimer</button>
            </form>
        </div>
        <div class="visible-xs"><br></div>
            <div class="col-sm-offset-3 col-sm-3">
                <a href="{{route('formRecipe', ['id'=>$boisson->id])}}"><button class="btn  btn-lg btn-success">Modifier Recette</button></a>  
            </div>
    </div>
</div>
<br>

@endsection



