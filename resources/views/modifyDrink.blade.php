@extends('templates/structure')

@section('title')
Boissons
@endsection

@section('TitlePageName')
Modifier {{ $boisson->name }}
@endsection
@section('content')
<div class="container ">
    <form class="well col-md-offset-2 col-md-8" action="" method="post">
        {{ csrf_field() }}
        <label class="col-md-4"><b>Name:</b></label> <input class="col-md-6" type="text" name="name" required="required" value="{{ $boisson->name }}"><br><br>
        <label class="col-md-4"><b>Price:</b></label> <input class="col-md-6" type="text" name="price" required="required" value="{{ $boisson->price }}"><br><br>
        @if ($boisson->active === 0)
        <label class="col-md-4">Status:</label><label class="switch col-md-6">
            @if ($boisson->active === 1)
            <input type="checkbox" name="active" value="0" checked>
                @else
                <input type="checkbox" name="active" value="1">
            @endif

            <span class="slider round"></span> </label><br><br>
@endif
        <button class="btn btn-lg btn-primary" type="submit">Modifier</button>
        <input type="hidden" name="_method" value="put">
    </form>
</div>
@endsection


