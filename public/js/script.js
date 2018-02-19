$(document).ready(function(){
/////////////////Sergio/////////////////
// $(".boisson").css("opacity", 1);

    function selectDrink(doSelect,drink){
          if (doSelect === true && drink === 'latte'){
              $('.btnLat').attr("src", "img/Vue1/Latte_click.png");
          }else{
              $('.btnLat').attr("src", "img/Vue1/Choixboisson_Latte.png");
          };
          if (doSelect === true && drink === 'expresso'){
              $('.btnExp').attr("src", "img/Vue1/expresso_click.png");
          }else{
              $('.btnExp').attr("src", "img/Vue1/Choixboisson_expresso.png");
          };
          if (doSelect === true && drink === 'chocolat'){
              $('.btnChoc').attr("src", "img/Vue1/Chocolat_click.png");
          }else{
              $('.btnChoc').attr("src", "img/Vue1/Choixboisson_chocolat.png");
          };
          if (doSelect === true && drink === 'tea'){
              $('.btnThe').attr("src",'img/Vue1/Tea_click.png');
          }else{
              $('.btnThe').attr("src", 'img/Vue1/Choixboisson_tea.png');
          };
          if (doSelect === true){
            $('.2euros').attr('src', 'img/Vue1/2_euros.png')
            $('.1euro').attr('src', 'img/Vue1/1_euros.png')
            $('.50cts').attr('src', 'img/Vue1/50_cen.png')
            $('.20cts').attr('src', 'img/Vue1/20_cen.png')
            $('.10cts').attr('src', 'img/Vue1/10_cen.png')
            $('.5cts').attr('src', 'img/Vue1/5_cen.png')
          }
          else{
            $('.2euros').attr('src','img/Vue1/2euros_selec.png')
            $('.1euro').attr('src', 'img/Vue1/1euro_selec.png')
            $('.50cts').attr('src', 'img/Vue1/50cen_selec.png')
            $('.20cts').attr('src', 'img/Vue1/20cen_selec.png')
            $('.10cts').attr('src', 'img/Vue1/10cen_selec.png')
            $('.5cts').attr('src', 'img/Vue1/5cen_selec.png')
          }
    };
////////////////// BUTTON TO SELECT DRINK /////
let drinkSelect;

    $('.btnLat').click(function(){
        selectDrink(true, 'latte');
        drinkSelect = "latte";
        $('.boiChoi').text('Latte – 0.50 cts');
        $('.coins input').prop('disabled', false);
    });
    $('.btnLat').dblclick(function(){
        selectDrink(false, 'latte');// Implémentez​ ​une​ ​fonction​ ​​resetDrink()​ ​​qui​ ​désélectionne​ ​toutes​ ​les​ ​boissons: le dblclick permet de reset les drink//
        $('.boiChoi').text(' ');
        $('.coins input').prop('disabled', true);
    });
    $('.btnExp').click(function(){
        selectDrink(true, 'expresso');
        drinkSelect = "espresso";
        $('.boiChoi').text('Expresso – 0.50 cts');
        $('.coins input').prop('disabled', false);
    });
    $('.btnExp').dblclick(function(){
        selectDrink(false, 'expresso');
        $('.boiChoi').text(' ');
        $('.coins input').prop('disabled', true);
    });
    $('.btnChoc').click(function(){
        selectDrink(true, 'chocolat');
        drinkSelect = "chocolate";
        $('.boiChoi').text('Chocolat – 0.50 cts');
        $('.coins input').prop('disabled', false);
    });
    $('.btnChoc').dblclick(function(){
        selectDrink(false, 'chocolat');
        $('.boiChoi').text(' ');
        $('.coins input').prop('disabled', true);
    });
    $('.btnThe').click(function(){
        selectDrink(true, 'tea');
        drinkSelect = "tea";
        $('.boiChoi').text('Thé – 0.50 cts');
        $('.coins input').prop('disabled', false);
    });
    $('.btnThe').dblclick(function(){
        selectDrink(false, 'tea');
        $('.boiChoi').text(' ');
        $('.coins input').prop('disabled', true);
    });

///////////////////Button + and - sugar when clicked //////////////
      $('.btnPlus').mousedown(function(){
        $('.btnPlus').attr('src','img/Vue1/Selection_sucre/buttonPlusactive.png')
      })
      $('.btnPlus').mouseup(function(){
        $('.btnPlus').attr('src','img/Vue1/Selection_sucre/buttonPlusinactive.png')
      })
         $('.btnMoins').mousedown(function(){
        $('.btnMoins').attr('src','img/Vue1/Selection_sucre/button---active.png')
      })
      $('.btnMoins').mouseup(function(){
        $('.btnMoins').attr('src','img/Vue1/Selection_sucre/button---inactive.png')
      })

    let sugar = 0;
    let nbSugar = [];
    $('.btnPlus').click(function(){
      if (sugar < 5){
        sugar = sugar + 1;
        if (sugar === 1){
          $('.sugar1').css('opacity', 1);
        };
        if (sugar === 2){
          $('.sugar2').css('opacity', 1);
        };
        if (sugar === 3){
          $('.sugar3').css('opacity', 1);
        };
        if (sugar === 4){
          $('.sugar4').css('opacity', 1);
        };
        if (sugar === 5){
          $('.sugar5').css('opacity', 1);
        };
      }
      console.log(sugar);
    });
      $('.btnMoins').click(function(){
      if (sugar > 0 ){
        sugar = sugar - 1;
        if (sugar === 0){
          $('.sugar1').css('opacity', 0);
        };
        if (sugar === 1){
          $('.sugar2').css('opacity', 0);
        };
        if (sugar === 2){

          $('.sugar3').css('opacity', 0);
        };
        if (sugar === 3){

          $('.sugar4').css('opacity', 0);
        };
        if (sugar === 4){

          $('.sugar5').css('opacity', 0);
        };

      }
      console.log(sugar);
    });
////////////////////// ADD COINS/////////
let prix = 0.50;
let coins_ser = 0;

    function addCoin(coin){
      if (coin === '2euros'){
        coins_ser = coins_ser + 2;
      }else if (coin === '1euro'){
        coins_ser = coins_ser + 1;
      }else if (coin === '50cts'){
        coins_ser = coins_ser + 0.5;
      }else if (coin === '20cts'){
        coins_ser = coins_ser + 0.2;
      }else if (coin === '10cts'){
        coins_ser = coins_ser + 0.1;
      }else if (coin === '5cts'){
        coins_ser = coins_ser + 0.05;
      };
      if (coins_ser > prix){
          let aRendre = coins_ser-prix;
          if (aRendre > 1){
            $('.messageRendu p').text('A rendre: ' +(aRendre).toFixed(2)+ ' €');
          }else{
            $('.messageRendu p').text('A rendre: ' +(aRendre).toFixed(2)+ ' cts');
          }

      }
      console.log(coins_ser)
    };
    $('.2euros').click(function(){
      addCoin('2euros');
      $('.affPieces').text('Montant inséré: ' +(coins_ser).toFixed(2)+ ' €');
      /*renduMonnaie(coins_ser,prix)*/
    });

    $('.1euro').click(function(){
      addCoin('1euro');
      $('.affPieces').text('Montant inséré: ' +(coins_ser).toFixed(2)+ ' €');
      /*renduMonnaie(coins_ser,prix)*/
    });

    $('.50cts').click(function(){
      addCoin('50cts');
      $('.affPieces').text('Montant inséré: ' +(coins_ser).toFixed(2)+ ' €');
      /*renduMonnaie(coins_ser,prix)*/
    });
    $('.20cts').click(function(){
      addCoin('20cts');
      $('.affPieces').text('Montant inséré: ' +(coins_ser).toFixed(2)+ ' €');
      /*renduMonnaie(coins_ser,prix)*/
    });
    $('.10cts').click(function(){
      addCoin('10cts');
      $('.affPieces').text('Montant inséré: ' +(coins_ser).toFixed(2)+ ' €');
      /*renduMonnaie(coins_ser,prix)*/
    });

    $('.5cts').click(function(){
      addCoin('5cts');
      $('.affPieces').text('Montant inséré: ' +(coins_ser).toFixed(2)+ ' €');
      /*renduMonnaie(coins_ser,prix)*/
    });
  let piecesExist = [2,1,0.50,0.20,0.10,0.05]; // liste de pieces disponible
  let piecesDispo = [50,50,50,50,50,50] // numero de pieces disponible de chaque valeur
  let piecesTotal = [50,50,50,50,50,50] // triche pour aficher le numero de pieces rendu
  let pieces = []; // liste de pieces rendu
function renduMonnaie(sommeEntree, cout){

  let monnaie = (coins_ser - prix);
    for (let i = 0; i < piecesDispo.length; i++){
      while (monnaie >= piecesExist[i] && piecesDispo[i] > 0){
          pieces.push(piecesExist[i]);
          monnaie = monnaie - piecesExist[i];
          piecesDispo[i] -= 1;
        }
    }
    /////////// Info de pieces rendu //////
    for(y = 0; y< piecesTotal.length; y++){
        console.log(' • ' + (piecesTotal[y]-piecesDispo[y]) +' pieces de ' + piecesExist[y]);
    }
  ////////////// Info de pieces restantes ////////
  for (let x = 0; x < piecesExist.length; x++)
    {
      if (piecesDispo[x] === 0)
        {
          console.log('Pieces de ' + piecesExist[x] + ' indisponible');
        }
      else
        {
          console.log(piecesDispo[x] +' Pieces de ' + piecesExist[x] + ' encore disponible');
        }
    }

}

    $('.btn-valider').click(function(){
      $('.messagePieces').hide();
      $('.messageRendu').hide();
      $('.boiChoi').hide();
      $('')
      renduMonnaie(coins_ser,prix);
      for(let y = 0; y< piecesTotal.length; y++){
        if((piecesTotal[y]-piecesDispo[y])>0){
          $('.messageBoisson').append("<p class='infoPiecesRendues'>' • '" + (piecesTotal[y]-piecesDispo[y]) +"' pieces de ' "+ piecesExist[y]);
                  $('.pieces').css('opacity',1);
        }
      }
      if (drinkSelect === "latte") {
        $("#Mug").css("opacity", 1)
        $("#latte").css("opacity", 1);
        console.log(drinkSelect);
      }
      if (drinkSelect === "espresso") {
        $("#Mug").css("opacity", 1)
        $("#espresso").css("opacity", 1);
        console.log(drinkSelect);
      }
      if (drinkSelect === "tea") {
        $("#Mug").css("opacity", 1)
        $("#tea").css("opacity", 1);
        console.log(drinkSelect);
      }
      if (drinkSelect === "chocolate") {
        $("#Mug").css("opacity", 1)
        $("#chocolate").css("opacity", 1);
        console.log(drinkSelect);
      }

      for (let x = 0; x < piecesExist.length; x++){
        if (piecesDispo[x] === 0){
            console.log('Pieces de ' + piecesExist[x] + ' indisponible');
        }
        else{
            $('.cinqCts p').text(piecesDispo[5]);
            $('.cinquanteCts').append("<p>"+piecesDispo[2]+"</p>");
        } 
    }
  });


///////////////////////////  FUNCTION TO RESET ALL ///////
    function resetAll(){
        $('.affPieces').text(' ');
        coins_ser = 0;
        $('.boiChoi').text(' ');
        selectDrink(false);
        $('.coins input').prop('disabled', true);
        sugar = 0;
        $('.sugar1, .sugar2, .sugar3, .sugar4, .sugar5').css('opacity', 0);
        aRendre = 0;
        $('.monnaie').text('');
        $(".boisson").css("opacity", 0)
        $(".infoPiecesRendues").text('')
    }
    $('.reset').click(function(){
        resetAll();
    })

    $('.reset').mousedown(function(){
      $('.reset').attr('src','img/Vue1/button-cancel-pressed.png')
    })
    $('.reset').mouseup(function(){
      $('.reset').attr('src','img/Vue1/button-cancel.png')
    })


    $(".boisson").click(function(){
      resetAll();
    });
/////////////////Axel/////////////////




/////////////////SCRIPT VUE 2/////////////////
    
  $('.rempMon').click(function(){
    $('.cinqCts').text('50');
    $('.dixCts').text('50');
    $('.vingtCts').text('50');
    $('.cinquanteCts').text('50');
    $('.unEu').text('50');
    $('.deuxEu').text('50');
  })

    $('.rempIng').mousedown(function(){
        $('.rempIng').attr('src','img/Vue1/Selection_sucre/button-+-active.png')
      })
      $('.rempIng').mouseup(function(){
        $('.rempIng').attr('src','img/Vue1/Selection_sucre/button-+-inactive.png')
      })
      $('.rempMon').mousedown(function(){
        $('.rempMon').attr('src','img/Vue1/Selection_sucre/button-+-active.png')
      })
      $('.rempMon').mouseup(function(){
        $('.rempMon').attr('src','img/Vue1/Selection_sucre/button-+-inactive.png')
      })



    function stock (drink,validated){
        if (drink === latte && validated === true){
            $('.stockeau').remove(4);
            $('.stocklait').remove(1);
            $('.stockcafe').remove(1);
            $('.stockmug').remove(1);
        }else if(drink === expresso && validated === true){
            $('.stockeau').remove(1);
            $('.stockcafe').remove(2);
            $('.stockmug').remove(1);
    
        }else if(drink === tea && validated === true){
            $('.stockeau').remove(4);
            $('.stocktea').remove(1);
            $('.stockmug').remove(1);
        } else if(drink === chocolat && validated === true){
            $('.stockeau').remove(4);
            $('.stockchoco').remove(1);
            $('.stocklait').remove(2);
            $('.stockmug').remove(1);
        }
    };



});
