$(function()
{
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
    if(passwordExists(valeur)) {
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

// Vérifier le format du mdp
