@extends('templates/structure')

@section('title')
    Monnayeur
@endsection

@section('TitlePageName')
    Monnayeur
@endsection

@section('content')
    <div class="row tableau table-responsive">
        <table class="table table-hover table-bordered col-sm-2">
            <tr>
                <th>Pièce (€)</th>
                <th>Stock</th>
            </tr>
            @foreach($coins as $key => $val)
            <tr>
                <td>{{$key / 100}}</td>
                <td>{{$val}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
@include('templates/buttons')    
@endsection
