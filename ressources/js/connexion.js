$(function()
{

  // Affichage de messages d'erreur
    $(".form_connexion").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: "ressources/php/afficher_erreurs_connexion.php",
        method: "POST",
        data: {
          email: $("input[name=email]").val(),
          password: $("input[name=password]").val(),
        },
        success: function(data) {

          if(data != "ok") {
            $(".erreur").removeClass("hidden");
            $(".erreur").text(data);
          } else {
            document.location.href = "profil.php";
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
})

// Fonction (avec un regex) qui teste si le mail est de la forme adéquate
function mailValide(email) {
  var regex = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/g;
  return email.match(regex);
}
