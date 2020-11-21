$(document).ready(function(){
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

    var droit_modif = getUrlParameter('id_droit');
    var droit_supp = getUrlParameter('id_supp');
    console.log(droit_modif);
    console.log(droit_supp);

    $('#modif').click(function(e){
        e.preventDefault();

        $.post(
            'ressources/php/droit_admin.php',
            {
                droit_modif : droit_modif,
                droit_supp : droit_supp
            },
            function(data){
                console.log(data);
            }
        );
    })
});