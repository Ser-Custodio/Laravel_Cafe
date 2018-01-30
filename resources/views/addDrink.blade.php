@extends('templates/structure')

@section('title')
Boissons
@endsection

@section('TitlePageName')
Ajouter une Boisson
@endsection
@section('content')
<div class="container ">
    <form class="well col-md-offset-2 col-md-8" action="" method="post">
        {{ csrf_field() }}
        <label class="col-md-4"><b>Name:</b></label> <input class="col-md-6" type="text" name="name" required="required"><br><br>
        <label class="col-md-4"><b>Price:</b></label> <input class="col-md-6" type="text" name="price" required="required"><br><br>
        <button class="btn btn-lg btn-primary" type="submit">Ajouter</button>
    </form>
</div>
@endsection



