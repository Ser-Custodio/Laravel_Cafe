<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Machine à Cafés</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
<div class="container">
    <form method="post" action="{{ route('ventes.store') }}">
    <div class='row'>

            {{ csrf_field() }}

            <div class='col-ms-2'>
                <label><input type="radio" name="drink" value="1"><img src="img/Vue1/Choixboisson_tea.png" class="btnThe"></label>
            </div>
            <div class="col-ms-2">
                <label>
                    <input type="radio" name="nbSugar" value="0"><img src="img/Vue1/Selection_sucre/button---inactive.png" class="btnMoins">
                </label>
            </div>
            <div class="col-ms-2">
                <label>
                    <input type="radio" name="nbSugar" value="1"><img src="img/Vue1/Selection_sucre/buttonPlusinactive.png" class="btnPlus">
                </label>
            </div>
    </div>
    <div><label>
            <input type="radio" name="drink" value="2"><img src="img/Vue1/Choixboisson_Chocolat.png" class="btnChoc">
        </label>
    </div>
    <div>
        <label>
            <input type="radio" name="drink" value="3"><img src="img/Vue1/Choixboisson_Latte.png" class="btnLat">
        </label>
    </div>
    <div>
        <label>
            <input type="radio" name="drink" value="4"><img src="img/Vue1/Choixboisson_expresso.png" class="btnExp">
        </label>
    </div>
        <button class="btn-valider btn btn-danger btn-lg">Valider</button>

    <div class='nbsugar container'>
        <img class="sugar1" src="img/Vue1/Selection_sucre/1_sucre.png">
        <img class="sugar2" src="img/Vue1/Selection_sucre/2_sucres.png">
        <img class="sugar3" src="img/Vue1/Selection_sucre/3_sucres.png">
        <img class="sugar4" src="img/Vue1/Selection_sucre/4_sucres.png">
        <img class="sugar5" src="img/Vue1/Selection_sucre/5_sucres.png">
    </div>
    </form>
    <div class='coins container'>
        <div class='row'>
            <div class='col-ms-2'>
                <input type='image' class='2euros' src='img/Vue1/2euros_selec.png' disabled="true">
                <input type='image' class='1euro' src='img/Vue1/1euro_selec.png' disabled="true">
            </div>
            <div class='col-ms-2'>
                <input type='image' class='50cts' src='img/Vue1/50cen_selec.png' disabled="true">
                <input type='image' class='20cts' src='img/Vue1/20cen_selec.png' disabled="true">
            </div>
            <div class='col-ms-2'>
                <input type='image' class='10cts' src='img/Vue1/10cen_selec.png' disabled="true">
                <input type='image' class='5cts' src='img/Vue1/5cen_selec.png' disabled="true">
            </div>
        </div>
    </div>
    <div class='container'>
        <input type='image' class='reset' src="img/Vue1/button-cancel.png">
    </div>
    <div class='row'>
        <div class='messageBoisson'>
            <p class="boiChoi"></p>
            <p class='infoPiecesRendues'></p>
        </div>
    </div>
    <div class="row">
        <div class='messagePieces'>
            <p class='affPieces'></p>
        </div>
    </div>
    <div class='row'>
        <div class='messageRendu'>
            <p class="monnaie"></p>
        </div>
    </div>
    <div class='maintenance container'>
        @if(\Illuminate\Support\Facades\Auth::check())
            <a href="{{route('ventes.index')}}"> <input type='image' class='mtnance' src='img/Vue1/btn-mtn.png'></a>
        @else
            <a href="{{url('login')}}"> <input type='image' class='mtnance' src='img/Vue1/btn-mtn.png'></a>
        @endif
    </div>
    <div class='monnayeur container'>
        <img src="img/Vue1/rendu-monnaie.png" alt="monnayeur">
    </div>
    {{--<form method="post" action="{{ route('ventes.store') }}">--}}
        {{--{{ csrf_field() }}--}}
       {{----}}
    {{--</form>--}}
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 drink">
            <img id="Mug" class="boisson" src="img/drink/Mug.png" alt="mug">
            <img id="espresso" class="boisson" src="img/drink/espresso.gif" alt="espresso">
            <img id="latte" class="boisson" src="img/drink/Latte.gif" alt="Latte">
            <img id="tea" class="boisson" src="img/drink/Tea.gif" alt="Tea">
            <img id="chocolate" class="boisson" src="img/drink/Chocolate.gif" alt="Chocolate">

        </div>

    </div>

</div>

<footer>
</footer>
</body>
</html>
