$( document ).ready(function() {
	$("#formular").submit(function(){
		Meldung("All", "");
		var email = $("#username").val();
		var password = $("#password").val();
		var password2 = $("#password2").val();
		var meldung;

		//Die verschiedenen Kontrollmethoden werden aufgerufen. Falls Eingaben unvalid sind werden Fehlermeldungen zurückgegeben.
		meldung = Checkemail(email);
		meldung += Checkpassword(password, password2);
		meldung += Checkgender();
		meldung += Checkhobbys();
		//Überprüft, ob Fehlermeldungen vorhanden sind, falls dies zutrifft werden sie ausgegeben
		if (meldung === ""){
			Registration(email, password);
		}else{
			Meldung("Exception", meldung);
		}
		return false;
	});
	//Login wird aufgerufen
	$("#login").submit(function(){
		Meldung("All", "");
		var email = $("#username").val();
		var password = $("#password").val();
		Login(email, password);
		return false;
	});
	//Benutzer wird ausgeloggt
	$("#Logout").click(function(){
		$.post("logout.php",{},
			function(data){
				if (data != "true") {
					Meldung("Exception", "Sie sind bereits ausgeloggt!");
				}else{
					Meldung("Success", "Sie haben sich erfolgreich ausgeloggt!");
					$("#Logout").css("display", "none");
				};
			});
	});
	//Löscht Benutzer
	$("#Del_user").click(function(){
		Meldung("", "");
		var deluser = prompt("Welchen Benutzer möchten sie löschen?", "E-Mail eingeben...");
		$.post("ben_loeschen.php",{postdeluser:deluser},
			function(data){
				if (data == "true") {
					Meldung("Success", "Benutzer erfolgreich gelöscht!");
				}else if(data == "notadmin"){
					Meldung("Exception", "Sie müssen Administrator sein um einen Benutzer zu löschen!");
				}else if(data == "notlogedon"){
					Meldung("Exception", "Sie müssen angemeldet sein um Änderungen vozunehmen!");
				}else{
				 Meldung("Exception", "Der Benutzer existiert nicht!");
			}
			});
	});
	//Speichert Blog einträge
	$("#blog").submit(function(){
		var text = $("#newblog").val();
		if (text != "") {
			Blog(text);
		}else{
			Meldung("Exception", "Leere Beiträge werden nicht gespeichert!");
		};
	});
	//Aktualisiert Blog
	$("#blogakt").click(function(){
		Meldung("", "");
		GetBlog();
	});
	//Löscht ausgewählten Post
	$("#Loeschen").click(function(){
		Meldung("", "");
		var blogid = prompt("Welchen Blog möchten sie löschen?", "Post_ID eingeben...");
		Changeblog(blogid, "true");
		GetBlog();
	});
	//Ändert ausgewählten Post
	$("#Aendern").click(function(){
		Meldung("", "");
		var blogid = prompt("Welchen Blog möchten sie ändern?", "Post_ID eingeben...");
		Changeblog(blogid, "false");
		GetBlog();
	});

	function Changeblog(blogid, type){
		$.post("blog_bearbeiten.php",{postid:blogid, postdelete:type},
			function(data){
				if (data == "false") {
					Meldung("Exception", "Es existiert kein Post mit dieser ID.");
				}else if(data == "notlogedon"){
					Meldung("Exception", "Um Änderungen vorzunehmen müssen Sie sich einloggen!");
				}else{
					$("#newblog").html(data);
				}
			});
		GetBlog();
	}
	//Gibt Blog aus
	function GetBlog (){
		var hoi = "ff";
		$.post("read_blog.php",{posthoi:hoi},
			function(data){
				if(data == "false"){
					$("#blog_Text");
					Meldung("Exception", "Es sind noch keine Posts vorhanden!");
				}else{
					$("#blog_Text").html(data);
				}

			});
	}
	//Überprüft, ob die eingegebene E-Mail gültig ist
	function Checkemail (email) {
		var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (regex.test(email) == false) {
			return "Der Benutzername muss eine valide E-Mail-Adresse enthalten!<br>";
		}else{
			return "";
		}
	}
	//Prüft Passwort nach den definierten Richtlinien
	function Checkpassword (password, password2) {
		var pwregex = /^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{9,})\S$/i;

		if (pwregex.test(password) == true) {
			if (password != password2) {
				return "Passwörter stimmen nicht überein!<br>";
			}else{
				return "";
			}
		}else{
			return "Passwort-Anforderungen werden nicht erfüllt!<br> Das Passwort muss mindestens 9 Zeichen lang sein, <br>Gross- und Kleinbuchstaben, sowie Sonderzeichen enthalten!<br>";

		}
	}

	//Prüft, ob das Geschlecht angegeben wurde
	function Checkgender(){
		if (document.getElementById("m").checked || document.getElementById("w").checked) {
			return "";
		}else{
			return "Geben Sie ihr Geschlecht an!<br>";
		}
	}

	//Prüft, ob mindestens ein Hobby gewählt wurde
	function Checkhobbys (){
		var cb1 = $("#hobbys1").is(":checked");
		var cb2 = $("#hobbys2").is(":checked");
		var cb3 = $("#hobbys3").is(":checked");
		var cb4 = $("#hobbys4").is(":checked");

		if (cb1 || cb2 || cb3 || cb4) {
				return "";
			}else{
				return "Es muss mindestens ein Hobby gewählt werden!<br>";
		}


	}

	//Die Informationen werden ausgwertet und anschliessend Ausgegeben.
	function Registration (email, password) {
		var creditcard = $("#kreditkarte").val();
		var männlich = document.getElementById("m");
		var gender;
		var hobby = "";

		//Liesst Geschlecht aus
		if (männlich.checked == true) {
			gender = "Männlich";
		}else{
			gender = "Weiblich";
		}
		//Überprüft, welches Hobby ausgewählt wurde
		for (var i = 1; i <= 4; i++) {
			if ($("#hobbys" + i).is(":checked")){
				hobby += $("#hobbys" + i).val();
				if ($("#hobbys" + (i + 1)).is(":checked")||$("#hobbys" + (i + 2)).is(":checked")||$("#hobbys" + (i + 3)).is(":checked")) {
					hobby += ", ";
				}
			}
		}

		$.post("registration.php",{postemail:email, postpassword:password, postgender:gender, posthobby:hobby, postcreditcard:creditcard},
			function(data){
				if (data == "true") {
					Meldung("Success", "Benutzer erfolgreich erfasst!");
				}else{
					Meldung("Exception", "E-Mail ist bereits vergeben!", "");
				};

			});


	}
	//Login Funktion
	function Login (email, password){
		$.post("login.php",{postemail:email, postpassword:password},
			function(data){

				if (data == "true"){
					Meldung("Success", "Sie wurden erfolgreich eingeloggt!", "2");
					window.location.href = "Blog.html";
					MeineDomain = location.host;

				}else{
					Meldung("Exception", "E-Mail oder Passwort falsch!", "2");

				}

			});
	}

	// Generiert Fehler- und Erfolgsmeldungen
	function Meldung (typ, meldung){
		if (typ == "Exception"){
			$("#errorspace").html(meldung);
		}else if(typ == "Success"){
			$("#informationspace").html(meldung);
		}else{
			$("#errorspace").html("");
			$("#informationspace").html("");
		}
	}
	//Speichert Post
	function Blog (text){

		$.post("blog.php",{posttext:text},
			function(data){
				if (data != "true") {
					Meldung("Exception", "Um einen Bericht zu erfassen müssen sie angemeldet sein!", "3");
				}else{
					Meldung("Success", "Der Bericht wure erfolgreich gespeichert!", "3");
				}
			});
		GetBlog();

	}
	//Setzt Meldungsfenster zurück
	function Reset (site){
		$("#errorspace" + site).html("");
		$("#informationspace" + site).html("");
	}
});
