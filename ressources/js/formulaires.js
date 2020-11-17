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

    // On change de classe en fonction de la valeur de l'input
    $("#email").keyup(function() {
      var valeur = $(this).val();
      if(mailValide(valeur)) {
        $("#email").addClass("vert");
        $("#email").removeClass("rouge");

      } else {
        $("#email").addClass("rouge");
        $("#email").removeClass("vert");
      }
    }),

    $("#password").keyup(function() {
      var valeur = $(this).val();
      if(valeur.length >= 8) {
        $("#password").addClass("vert");
        $("#password").removeClass("rouge");
      } else {
        $("#password").addClass("rouge");
        $("#password").removeClass("vert");
      }
    })

    $("#confirm_password").keyup(function() {
      var valeur = $(this).val();
      var ref = $("#password").val();
      if(valeur == ref) {
        $("#confirm_password").addClass("vert");
        $("#confirm_password").removeClass("rouge");
      } else {
        $("#confirm_password").addClass("rouge");
        $("#confirm_password").removeClass("vert");
      }
    })
  })

  // Fonction (avec un regex) qui teste si le mail est de la forme adéquate
  function mailValide(email) {
    var regex = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/g;
    return email.match(regex);
  }
