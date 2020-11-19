$(document).ready(function(){
    // create salon

    // create channel

    // submit message
    $('#create_new_message').click(function creer_message(){

        $.post(
            "ressources/php/traitement_chat.php",
            { message : $('#new_message').val() },
            function(data){
                if(data != 'success'){
                    $('.erreur').append('Votre message n\'a pas pu être transmis');
                }
                else{
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var hours = date.getHours();
                    var minutes = date.getMinutes();

                    var current_date = day + '/' + month + ' ' + hours + ':' + minutes;

                    var message = $('#new_message').val();

                    $('#affichage_msg').append($('<div class="entete_msg"></div>'));
                    $('#affichage_msg').append($('<div class="corps_msg"></div>'));

                    $('.entete_msg').append(localStorage['pseudo']);
                    $('.entete_msg').append(current_date);

                    $('.corps_msg').append(message);
                }
            }
        );
    });
});