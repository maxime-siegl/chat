$(document).ready(function(){

    $('.img_modif').click(function(e){
        e.preventDefault();

        $.post(
            'ressources/php/droit_admin.php',
            {
                droit_modif : this.id,
            },
            function(data){
                console.log(data);
                var modif = JSON.parse(data);
                console.log(modif[0]);

                if(modif[0] === 'modification_ok'){
                    $('#accessibilite'+modif[2]).html(modif[1]);
                } else{
                    console.log(modif)
                }
            }
        );
    });

    $('.img_supp').click(function(e){
        e.preventDefault();

        $.post(
            'ressources/php/droit_admin.php',
            {
                droit_supp : this.id
            },
            function(data){
                console.log(data);
                var supp = JSON.parse(data);
                console.log(supp[0]);

                if(supp[0] === 'suppression_ok'){
                    $('#ligne'+supp[1]).remove();
                } else{
                    console.log(supp)
                }
            }
        );
    });
});