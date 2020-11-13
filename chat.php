<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="ressources/css/style.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>

        <title>Little Discord</title>
    </head>
    <body id="page_chat">
        <?php include 'views/header.php'; ?>

        <main id="chat">
            <section id="channels"></section>
            <section id="messageries">
                <input type="text" name="new_message" id="new_message" placeholder="Ecrivez ici...">
                <button id="submit">Envoyer</button>
            </section>
            <section id="membres">
                <ul id="personnes">
                    <li><h3> Membres du Salon </h3></li>
                </ul>
            </section>
        </main>

        <?php include 'views/footer.php'; ?>
    </body>
    <script src="ressources/js/chat.js"></script>
</html>