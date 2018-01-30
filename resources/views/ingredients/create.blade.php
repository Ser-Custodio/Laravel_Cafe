@extends('templates/structure')

@section('title')
Ingredients
@endsection

@section('TitlePageName')
Ajouter un Ingrédient
@endsection
@section('content')
<div class="container ">
    <form class="well col-md-offset-2 col-md-8" action="{{ route('ingredients.store') }}" method="post">
        {{ csrf_field() }}
        <label class="col-md-4"><b>Name:</b></label> <input class="col-md-6" type="text" name="name" required="required"><br><br>
        <label class="col-md-4"><b>Stock:</b></label> <input class="col-md-6" type="text" name="stock" required="required"><br><br>
        <button class="btn btn-lg btn-primary" type="submit">Ajouter</button>
    </form>
</div>
@endsection

