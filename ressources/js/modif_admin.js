$(document).ready(function(){

    $('.img_modif').click(function(e){
        e.preventDefault();

        console.log('test');

        $.post(
            'ressources/php/droit_admin.php',
            {
                droit_modif : this.id,
                droit_supp : this.id
            },
            function(data){
                console.log(data);
                var modif = JSON.parse(data);
                console.log(modif[0]);

                if(modif[0] === 'modification_ok')
            }
        );
    })
});