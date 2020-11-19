    // cacher les input creation
    $('#form_new').hide();
    $('#moins_salon').hide();
    // $('#new_chan').hide();
    // $('#moins_channel').hide();

    // afficher input new salon
    $('#create_salon').click(function(){
        $('#form_new').show();
        $('#h3_salon').hide();
        $('#moins_salon').show();
    });

    // recacher l'input new salon
    $('#moins_salon').click(function(){
        $('#form_new').hide();
        $('#h3_salon').show();
        $('#moins_salon').hide();
    });

    // // afficher input new channel
    // $('#create_channel').click(function(){
    //     $('#new_chan').show();
    //     $('#new_channel').hide();
    //     $('#moins_channel').show();
    // });

    // // recacher input new channel
    // $('#moins_channel').click(function(){
    //     $('#new_chan').hide();
    //     $('#new_channel').show();
    //     $('#moins_channel').hide();
    // });

    // new salon
    $('#new_salon').submit(function(e){
        e.preventDefault();
        console.log($('#new_salon').val());
        $.post(
            'ressources/php/creation.php',
            {
                new_salon : $('#new_salon').val()
            },
            function(data){
                console.log(data);

                if(data[1] == 'Success'){
                    $('.salon').append('<li id="'+ data[0] +'">'+ new_salon +'</li>');
                    console.log(data);
                }
                else{
                    console.log(data);
                }
            }
        );
    })

    // // new channel
    // $('#new_channel').submit(function(e){
    //     e.preventDefault();

    //     $.post(
    //         'ressources/php/creation.php',
    //         {
    //             new_salon : $('#new_channel').val(),
    //         },
    //         function(data){
    //             if(data == "Success"){
    //                 $('.chan').append('<li>'+ new_channel +'</li>');
    //             }
    //         }
    //     );
    // });

    // new message
    $('#create_new_message').submit(function creer_message(){

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

                    $('#affichage_msg').append('<div id="one_message"></div>');
                    $('#one_message').append($('<p class="entete_msg">'+ localStorage['pseudo'] + current_date +'</p>'));
                    $('#one_message').append($('<p class="corps_msg">'+ message +'</p>'));

                    // stock tab, recup tab, map ??????
                }
            }
        );
    });