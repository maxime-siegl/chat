    afficher_msg();

    $(document).ready(function(){
        // cacher les input creation
        $('#form_new').hide();
        $('#moins_salon').hide();


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

        // new salon
        $('#submit_salon').click(function(e){
            e.preventDefault();

            $('#form_new').hide();
            $('#h3_salon').show();
            $('#moins_salon').hide();

            $.post(
                'ressources/php/creation.php',
                {
                    new_salon : $('#new_salon').val()
                },
                function(data){
                    var result = JSON.parse(data);

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

        // new message
        $('#submit_new_message').click(creer_message);


        $('#nav_open').click(function(){
            openNav();
            $('#nav_open').hide();
        });
        $('#nav_close').click(function(){
            closeNav();
            $('#nav_open').show();
        });
        // Le MENU
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("open_nav").style.marginLeft = "250px";
        };
        
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("open_nav").style.marginLeft = "0";
        };

        $('#nav_open2').click(function(){
            openNav2();
            $('#nav_open2').hide();
        });
        $('#nav_close2').click(function(){
            closeNav2();
            $('#nav_open2').show();
        });
        // Le MENU
        function openNav2() {
            document.getElementById("mySidebar2").style.width = "250px";
            document.getElementById("open_nav2").style.marginRight = "250px";
        };
        
        function closeNav2() {
            document.getElementById("mySidebar2").style.width = "0";
            document.getElementById("open_nav2").style.marginLeft = "0";
        };
        // Fin Menu
    });

    function afficher_msg(){

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

        $.post(
            'ressources/php/affichage_messages.php',
            {
                id_salon_current : id_salon_current
            },
            function(data){
                var message_recup = JSON.parse(data);

                const html = message_recup[0].map(function(message){
                    var date = new Date(message.date);
                    var day = date.getDate();
                    var month = date.getMonth();
                    var hours = date.getHours();
                    var minutes = date.getMinutes();
                    var date_current = day + '/' + month + ' ' + hours + ':' + minutes;

                    return '<article class="affichage_msg">\n' +
                                '<div id="one_message"><p class="entete_msg">' + message.pseudo + '&nbsp;' + date_current + '</p>\n' +
                                    '<p class="corps_msg">' + message.message + '</p>\n' +
                                '</div>\n' +
                            '</article>\n';
                }).join('');
                $('.affichage_msg').html(html);
                $('.affichage_msg').scrollTop = $('.affichage_msg').scrollHeight;
            }
        )
        setTimeout(afficher_msg, 2000);
    }

    function creer_message(e){
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
                    $('#new_message').val('').focus();
                    afficher_msg();
                }
            }
        );
    }