@extends('templates/structure')

@section('title')
Détails des Ingrédients
@endsection

@section('TitlePageName')
{{ $ingredient->name }}
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
                    <th>STOCK</th>
                </tr>
                <tr>                    
                    <td>{{ $ingredient->id }} </td>
                    <td>{{ $ingredient->name }} </td>
                    <td>{{ $ingredient->stock }} </td>       
                </tr>
            </table>           
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
          <a href="{{route('ingredients.edit', ['id'=>$ingredient->id])}}"><button class="btn btn-lg btn-success">Modifier</button></a>
      </div>
      <div class="col-sm-5">
        <form method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-lg btn-primary" type="submit">Supprimer</button>
        </form>
    </div>
</div>
</div>
<br>

@endsection



