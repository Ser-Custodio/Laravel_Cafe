@extends('templates/structure')

@section('title')
    Boissons
@endsection

@section('TitlePageName')
    Recette de: {{ $boisson->name }}
@endsection
@section('content')
    <div class="container ">
        <form class="well col-md-offset-2 col-md-8" action="" method="post">
            {{ csrf_field() }}
            <label class="col-md-4"><b>Ingredient:</b></label>
            <select name="ingredient_id" class="col-md-6" required="required">
                @foreach ($ingredients as $unIngredient)
                    <option value="{{ $unIngredient->id }}">{{ $unIngredient->name }}</option>
                @endforeach
            </select>
            <br><br>
            <label class="col-md-4"><b>Quantity:</b></label> <input class="col-md-6" type="text" name="quantity"
                                                                    required="required"><br><br>
            <button class="btn btn-lg btn-primary" type="submit">Add Ingredient</button>
        </form>
        <div class="col-sm-offset-3 col-md-6">
            <form method="post">
                {{ csrf_field() }}
                <table class="table table-responsive table-hover table-bordered 	table-editBoissons col-sm-12">
                    <tr>
                        <th>INGREDIENT</th>
                        <th>QUANTITY</th>
                    </tr>
                    @foreach($recette as $unIng)
                        <tr>
                            <td>{{ $unIng->name }} </td>
                            <td>{{ $unIng->pivot->quantity }}</td>
                            <td><input type="hidden" name="_method" value="delete">
                                <button type='submit' value="{{$unIng->id}}" name="ingredient"
                                        class='btn btn-sm btn-info'>Delete
                                </button>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </form>
        </div>

    </div>
    <div>
        @if ($recette->isNotEmpty())
            <a href={{ url('boissons')}}>
                <button class="btn btn-lg btn-success">Validate Recipe</button>
            </a>
        @endif

    </div>
@endsection



