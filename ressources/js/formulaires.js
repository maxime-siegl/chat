$(function() {
  // Affichage de messages d'erreur - formulaire d'inscription
  $("#inscription").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: "ressources/php/afficher_erreurs_inscription.php",
      method: "POST",
      data: {
        pseudo: $("input[name=pseudo]").val(),
        email: $("input[name=email]").val(),
        password: $("input[name=password]").val(),
        confirm_password: $("input[name=confirm_password]").val()
      },
      success: function(data) {

        if(data != "ok") {
          $(".erreur").removeClass("hidden");
          $(".erreur").text(data);
        } else {
          document.location.href = "connexion.php";
        }
      }
    })
  })

  // Affichage de messages d'erreur - formulaire de connexion
  $("#connexion").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: "ressources/php/afficher_erreurs_connexion.php",
      method: "POST",
      data: {
        email: $("input[name=email]").val(),
        password: $("input[name=password]").val(),
      },
      success: function(data) {

        console.log(data);
        var info = JSON.parse(data);
        console.log(info);
        console.log(info[0].pseudo);

        if(info[1] === 'Success') {
          localStorage['pseudo'] = info[0].pseudo;
          localStorage['id'] = info[0].id;
          localStorage['email'] = info[0].email;

          document.location.href = "chat.php";
        } else {
          $(".erreur").removeClass("hidden");
          $(".erreur").text(data);
        }

      }
    })
  })

  // Modification du profil
  $("#profil").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: "ressources/php/modifier_profil.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {

        if(data != "") {
          $(".erreur").removeClass("hidden");
          $(".erreur").text(data);
        }

      }
    })

    if($("#avatar").val() != "") {
      var changer_avatar = $("#avatar")[0].files[0].name;

      if(changer_avatar != "") {
        $("#image_avatar").attr("src", "img/" + changer_avatar);
      }
    }
  })

    // On change de classe en fonction de la valeur de l'input
    $("#pseudo").keyup(function() {
      $(".erreur").addClass("hidden");

      var valeur = $(this).val();
      if(valeur.length >= 3) {

        $("#pseudo").addClass("vert");
        $("#pseudo").removeClass("rouge");
        $("#pseudo").css('border-bottom', "1px solid #90DEA6");


      } else if(valeur.length == 0){ // Lorsque le champ est vide, on rétablit la couleur d'origine
        $("#pseudo").blur(function(){
          $("#pseudo").css('border-bottom', "1px solid grey");
        })

      } else {
        $("#pseudo").addClass("rouge");
        $("#pseudo").removeClass("vert");
        $("#pseudo").css('border-bottom', "1px solid #DE9090");
      }
    })

    $("#pseudo").blur(function(){
      $("#pseudo").css('border-bottom', "1px solid grey");
    })


    $("#email").keyup(function() {
      $(".erreur").addClass("hidden");
      var valeur = $(this).val();
      if(mailValide(valeur)) {

        $("#email").addClass("vert");
        $("#email").removeClass("rouge");
        $("#email").css('border-bottom', "1px solid #90DEA6");

      } else if(valeur.length == 0){
        $("#email").blur(function(){
          $("#email").css('border-bottom', "1px solid grey");
        })

      } else {
        $("#email").addClass("rouge");
        $("#email").removeClass("vert");
        $("#email").css('border-bottom', "1px solid #DE9090");
      }
    }),

    $("#password").keyup(function() {
      $(".erreur").addClass("hidden");
      var valeur = $(this).val();
      if(valeur.length >= 8) {
        $("#password").addClass("vert");
        $("#password").removeClass("rouge");
        $("#password").css('border-bottom', "1px solid #90DEA6");
      } else if(valeur.length == 0){
        $("#password").blur(function(){
        $("#password").css('border-bottom', "1px solid grey");
      })
      } else {
        $("#password").addClass("rouge");
        $("#password").removeClass("vert");
        $("#password").css('border-bottom', "1px solid #DE9090");
      }
    })

    $("#confirm_password").keyup(function() {
      $(".erreur").addClass("hidden");
      var valeur = $(this).val();
      var ref = $("#password").val();
      if(valeur == ref) {
        $("#confirm_password").addClass("vert");
        $("#confirm_password").removeClass("rouge");
        $("#confirm_password").css('border-bottom', "1px solid #90DEA6");
      } else if(valeur.length == 0){
        $("#confirm_password").blur(function(){
        $("#confirm_password").css('border-bottom', "1px solid grey");
      })
      } else {
        $("#confirm_password").addClass("rouge");
        $("#confirm_password").removeClass("vert");
        $("#confirm_password").css('border-bottom', "1px solid #DE9090");
      }
    })
  })



  // Fonction (avec un regex) qui teste si le mail est de la forme adéquate
  function mailValide(email) {
    var regex = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/g;
    return email.match(regex);
  }
