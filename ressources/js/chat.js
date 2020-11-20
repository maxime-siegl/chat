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
    $('#submit_salon').click(function(e){
        e.preventDefault();

        $('#form_new').hide();
        $('#h3_salon').show();
        $('#moins_salon').hide();

        console.log($('#new_salon').val());
        $.post(
            'ressources/php/creation.php',
            {
                new_salon : $('#new_salon').val()
            },
            function(data){
                console.log(data);
                var result = JSON.parse(data);
                console.log(result);

                var id_plus_un = ++result[0][0];

                if(data == 'erreur'){
                    console.log('erreur');
                }
                else{
                    $('.salon').append('<li id="'+ id_plus_un +'"><a href="chat.php?id_salon_current='+ id_plus_un +'">'+ result[1] +'</a></li>');
                    console.log('success');
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
    $('#submit_new_message').click(function creer_message(e){
        e.preventDefault();

        // recup url get envoyé (ici le num du salon)
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };

        var id_salon_current = getUrlParameter('id_salon_current');
        console.log(id_salon_current);

        $.post(
            "ressources/php/traitement_chat.php",
            {
                message : $('#new_message').val(),
                id_salon_current : id_salon_current
            },
            function(data){
                console.log(data);
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
                    $('#one_message').append($('<p class="entete_msg">'+ localStorage['pseudo'] +'&nbsp;'+ current_date +'</p>'));
                    $('#one_message').append($('<p class="corps_msg">'+ message +'</p>'));

                    // stock tab, recup tab, map ??????
                }
            }
        );
    });