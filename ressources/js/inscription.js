$(function() {
  // Affichage de messages d'erreur
    $(".form_connexion").submit(function(e) {
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
  })
