@extends('templates/structure')

@section('title')
Ingredients
@endsection

@section('TitlePageName')
Modifier {{ $ingredients->name }}
@endsection
@section('content')
<div class="container ">
    <form class="well col-md-offset-2 col-md-8" action="{{ route('ingredients.update', $ingredients->id)}}" method="post">
        {{ csrf_field() }}
        <label class="col-md-4"><b>Stock:</b></label> <input class="col-md-6" type="text" name="stock" required="required" value="{{ $ingredients->stock }}"><br><br>
        <button class="btn btn-lg btn-primary" type="submit">Modifier</button>
        <input type="hidden" name="_method" value="put">
    </form>
</div>
@endsection

