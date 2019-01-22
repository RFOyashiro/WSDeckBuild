$(document).ready(function() {
    $('#message-btn-fermer').click(function(){
        $('.col-md-12').slideUp('slow');
    });

    $.ajax({
        method : "get",
        url    : "jsonEstConnecte.php",
        success: onSuccessEstConnecte,
        error  : onError
    });

    $('#form-login').submit(function(){
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: onSuccessLogin,
            error: onError
        });
        return false;
    });

     $('#form-logout').submit(function(){
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: onSuccessLogout,
            error: onError
        });
        return false;
    });
	
	$('#inscription').submit(function(){
		$.ajax({
			method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
			success: onSuccessInscription,
			error: onError
		});
		return false;
	});

    $('#cardSearchNum').submit(function(){
        $.ajax({
            method : $(this).attr('method'),
            url    : $(this).attr('action'),
            data   : $(this).serialize(),
            success: onSuccessCardSearch,
            error  : onError
        });
        return false;
    });

    $('#cardSearchSerie').submit(function(){
        $.ajax({
            method : $(this).attr('method'),
            url    : $(this).attr('action'),
            data   : $(this).serialize(),
            success: onSuccessCardSearchSerie,
            error  : onError
        });
        return false;
    });

    $('#nommage').submit(function(){
        $.ajax({
            method : $(this).attr('method'),
            url    : $(this).attr('action'),
            data   : $(this).serialize(),
            success: onSuccessNommage,
            error  : onError
        });
        return false;
    });

});

function onSuccessNommage(retour){
    if (retour.success){
        $('#nommage').fadeOut('fast');
        $('#choixType').fadeIn('fast');
        $('#deck').fadeIn('fast');
    }
    else{
        
    }
}


function onSuccessLogin(retour){
    console.log(retour);
    if (retour.success){
        $('#form-login').hide();
        $('#form-logout').fadeIn('slow');
		$('#Sinsrcicre').fadeOut('fast');
        $('#all').fadeIn('fast');
        $('#message').html(retour.message); 
    } else{
		$('#form-login').append("Username or Password is false");
    }
}
function onSuccessLogout(retour){
    console.log(retour);
    if (retour.success){
        $('#form-logout').hide();
        $('#form-login').fadeIn('slow');
		$('#Sinsrcicre').fadeIn('fast');
        $('#all').fadeOut('fast');
        $('#message').html(retour.message); 
    } else{

    }
}
function onSuccessEstConnecte(retour){
    console.log(retour);
    if (retour.success){
        $('#form-logout').fadeIn('slow');
		$('#Sinsrcicre').fadeOut('fast');
        $('#all').fadeIn('fast');
    }
    else {
        $('#form-login').fadeIn('slow');
		$('#Sinsrcicre').fadeIn('fast');
    }
    $('#message').html(retour.message)
                 .fadeIn('fast');
}
function onSuccessCardSearch(retour){
    if (retour.success) {
        var searchResult = $('#cardSearchResult');
        /*$('<div />').class('Card')
            .appendChild($('<div />').class('NumCard').html(retour.carte))*/
        searchResult.html('' +
            '<div class="Card">' +
            '   <div class="NumCard">Num  : ' + retour.carte + '</div>' +
            '   <div class="SerieCard">Serie : ' +	retour.serieCard + '</div>' +
            '   <div class="PicCard"><a href="javascript:void(0)" id="' + retour.carte + '" onclick="addCardDeck(this);"><img class="card" src="' + retour.carteLink + '"/></a></div>' +
            '   <div class="NameCard">Name     : ' + retour.nameCard + '</div>' +
            '   <div class="LevelCard">Level   : ' +	retour.levelCard + '</div>' +
            '   <div class="CoutCard">Cost    : ' + retour.coutCard + '</div>' +
            '   <div class="ColorCard">Color : ' +	retour.colorCard + '</div>' +
            '   <div class="TriggerCard">Trigger : ' + retour.triggerCard + '</div>' +
            '   <div class="TypeCard">Type    : ' + retour.typeCard + '</div>' +
            '</div>')
            .show();
    }
    else {
        var searchResult = $('#cardSearchResult');
        searchResult.html('');
        alert('La carte ' + retour.carte);
    }
}

function onSuccessCardSearchSerie(retour) {
    if (retour.success) {
        var searchResult = $('#cardSearchResult').html('');
        for (var i = 0; i < retour.nbCard; ++i) {
            searchResult.append('' +
                '<div class="Card">' +
                '   <div class="NumCard">Num  : ' + retour.carte[i] + '</div>' +
                '   <div class="SerieCard">Serie : ' + retour.serieCard + '</div>' +
                '   <div class="PicCard"><a href="javascript:void(0)" id="' + retour.carte[i] + '" onclick="addCardDeck(this);"><img class="card" src="' + retour.carteLink[i] + '"/></a></div>' +
                '   <div class="NameCard">Name     : ' + retour.nameCard[i] + '</div>' +
                '   <div class="LevelCard">Level   : ' + retour.levelCard[i] + '</div>' +
                '   <div class="CoutCard">Cout    : ' + retour.coutCard[i] + '</div>' +
                '   <div class="ColorCard">Color : ' + retour.colorCard[i] + '</div>' +
                '   <div class="TriggerCard">Trigger : ' + retour.triggerCard[i] + '</div>' +
                '   <div class="TypeCard">Type    : ' + retour.typeCard[i] + '</div><br/><br/>' +
                '</div>');
        }
        searchResult.show();
    }
}

function dispSNum(){
    $('#cardSearchSerie').fadeOut('fast');
    $('#cardSearchNum').fadeIn('fast');
    return false;
}

function dispSSerie(){
    $('#cardSearchNum').fadeOut('fast');
    $('#cardSearchSerie').fadeIn('fast');
    return false;
}

function onError(retour){
    alert("Une erreur sauvage est apparue !!!");
}

var Deck = []; //array du deck (un array d'objet Carte)
function Carte (num, nbFois){ //objet Carte
    this.num = num;
    this.nbFois = nbFois;
}
var alreadyTold = false;

function addCardDeck(obj){ //ici, on ajoute/modifie un objet Carte dans l'array Deck
    //lors de click sur image dans searchResult
    var isIn = false;
	var nbCard = 0;
    for (var i = 0; i < Deck.length; i++) {
        if (Deck[i].num == $(obj).attr("id")) {
            isIn = true;
            if (Deck[i].nbFois == 4) {
                alert('Cette carte est déjà 4 fois dans votre deck. si son effet indique qu\'il est possible d\'en mettre plus, la base de donnée ne gère pas encore cette exception.');
            }
            else {
                var Total = ++Deck[i].nbFois;

                $('#nbFois' + i).text('X ' + Total);
            }
            break;
        }
    }
    if (!isIn){
        Deck.push(new Carte($(obj).attr("id"), 1));
        $('#deck').append('<div id="' + Deck[Deck.length - 1].num.replace('/','') + '"><a href="javascript:void(0)" onclick="removeCardDeck(this);" id="' + Deck[Deck.length - 1].num + 'l">' + Deck[Deck.length - 1].num + ' <span id="nbFois' + (Deck.length-1) + '">X ' + Deck[Deck.length - 1].nbFois + '</span></a></div>');
    }
	
	for (var i = 0; i < Deck.length; i++) {
		nbCard += Deck[i].nbFois;
        $('#nbCard').text(nbCard + '/50');
		if (nbCard == 50 && !alreadyTold){
            alert("Vous avez 50 Cartes dans votre deck. Vous pouvez maintenant l'envoyer");
			$('#deck').append('' +
                '           <div id="SEND">' +
                '               <br/><br/><br/>' +
                '               <input type="button" onclick="sendDeck(Deck);"value="Submit your deck"/>' +
                '           </div>');
			alreadyTold = true;
		}
		if (nbCard > 50){
			$('#SEND').remove();
            alreadyTold = false;
		}
	}

    /*affiche l'id / nom / nbFois (recuperation nom depuis BD avec id) ?*/
}

function removeCardDeck(obj){ //ici, on supprime/modifie un objet Carte dans l'array Deck
    //lors de click sur ligne dans deck
	
	var nbCard = 0;
    for (var i = 0; i < Deck.length; i++) {
        if (Deck[i].num == $(obj).attr("id").slice(0, -1)) {
            if (Deck[i].nbFois == 1) {
                $('#' + Deck[i].num.replace('/','')).remove();
				Deck.splice(i, 1);
            }
            else {
                var Total = --Deck[i].nbFois;
                $('#nbFois' + i).text('X ' + Total);
            }
            break;
        }
    }

    if(Deck.length == 0){
        $('#nbCard').text('0/50');
    }

	for (var i = 0; i < Deck.length; i++) {
        nbCard += Deck[i].nbFois;
        $('#nbCard').text(nbCard + '/50');
		if (nbCard == 50 && !alreadyTold){//normalement 50, mais pour test, on met moins
            alert("Vous avez 50 Cartes dans votre deck. Vous pouvez maintenant l'envoyer");
			$('#deck').append('' +
                '           <div id="SEND">' +
                '               <br/><br/><br/>' +
                '               <input type="button" onclick="sendDeck(Deck);"Submit your deck/>' +
                '           </div>');
            alreadyTold = true;
		}
		if (nbCard < 50){
			$('#SEND').remove();
            alreadyTold = false;
		}
	}
	
    /*si nbFois de l'id = 1 => suppresion de l'id dans deck
    * si NbFois > 1 => Nbfois - 1
    */
}

function sendDeck(deck){
	var deck_json = JSON.stringify(Deck);
	$.ajax({
			method : "POST",
			url    : "sendDeck.php",
			data   : {deck: deck_json, namePhp: name}/*.serialize*/,
			success: onSuccessSendDeck,
			error  : onError
		});
	return false;
}

function onSuccessSendDeck(retour){
    //lors de validation du deck
	if(retour.success){
        alert('Votre Deck a été créé !');
        window.location.replace("index.php");
	}
    /*si ncClimax > 8 => alert(deck invalide : trop de climax)
    * si nbClimax < 8 => alert(vous avez moins de 8 climax, êtes vous sûr ? (y/n))
    * nommer deck
    * ajout du deck dans decklist
    * ajout des cartes dans deckcomposition
    */
}

function signIn (){
	$('#form-login').fadeOut('fast');
	$('#Sinsrcicre').fadeOut('fast');
	$('#inscription').fadeIn('fast');
}	

function onSuccessInscription (retour){
	if (retour.success){
		alert("vous voilà inscrit");
		$('#inscription').fadeOut('fast');
		$('#form-login').fadeIn('slow');
		
	}
	else {
        alert("pseudo déjà utilisé");
    }
}

function showDeck(NumDeck){
    $('#DeckList').fadeOut('fast');
    $.ajax({
        method : "POST",
        url    : "showDeck.php",
        data   : {NumDeck: NumDeck}/*.serialize*/,
        success: onSuccessShow,
        error  : onError
    });
    return false;
}

function onSuccessShow(retour){
    if (retour.success){
        for (var i = 0; i < retour.i; ++i) {
            $('#ShowDeck').append('' +
                '       <div class="Card">' +
                '           <div class="NumCard">' + retour.numCard[i] + '</div>' +
                '           <div class="nbFoisCard"> X ' + retour.nbFoisCard[i] + '</div>' +
                '           <div class="PicCard"><img class="card" src="http://wsdecks.com/static/img/' + retour.carteLink[i] + '.gif"/></div>' +
                '       </div>')
                .fadeIn('fast');
        }
        $('#change').fadeIn('fast');
    }
    else {

    }
}

function showDeckList(){
    $('#ShowDeck').fadeOut('fast')
        .html("");
    $('#change').fadeOut('fast');
    $('#DeckList').fadeIn('fast');
}

function showDeckConstrutionRules(){
    $('#deckRules').fadeIn('fast');
    $('#showRules').hide();
    $('#hideRules').show();
}

function hideDeckConstrutionRules(){
    $('#deckRules').fadeOut('fast');
    $('#showRules').show();
    $('#hideRules').hide();
}