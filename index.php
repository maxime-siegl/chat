<?php
include("classes/Utilisateur.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="ressources/css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>

    <title>Little Discord</title>
</head>
<body class="page_index">
    <?php include 'views/header.php'; ?>

    <main>
        <hr>
        <section id="index">
            <section id="corpus">
                <section id="intro">
                    <div class="description">
                        <h2>Travail Flexible</h2>
                        <p>Travailler chez soi pour plus de productivité et de flexibilité. </p>
                    </div>
                    <div class="description">
                        <h2>Clients Satisfaits</h2>
                        <p>Un chat permet de recevoir des réponses plus rapidement.</p>
                    </div>
                    <div class="description">
                        <h2>Réduction des Coûts</h2>
                        <p>Plus besoin de louer des locaux lorsque l'on communique à distance.</p>
                    </div>
                </section>
                <section id="image">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="674" height="541" viewBox="0 0 674 541">
                        <defs>
                            <pattern id="pattern" preserveAspectRatio="xMidYMid slice" width="100%" height="100%" viewBox="0 0 618 543">
                                <image width="618" height="543" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAkACQAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAIfAmoDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD896KKK6ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAorb8EaCninxho2jySGKO+u47dnXqAzAE/rX298YPCH7KHwB8cXXgrxB4L8Uarq2nxx+dd2+oMEkLKDkDzBjr6UrgfA1FfYf/Ccfsbf9E68X/wDgxb/47R/wnH7G3/ROvF//AIMW/wDjtFwPjyivsP8A4Tj9jb/onXi//wAGLf8Ax2j/AITj9jb/AKJ14v8A/Bi3/wAdouB8eUV9h/8ACcfsbf8AROvF/wD4MW/+O0f8Jx+xt/0Trxf/AODFv/jtFwPjyivsP/hOP2Nv+ideL/8AwYt/8do/4Tj9jb/onXi//wAGLf8Ax2i4Hx5RX2H/AMJx+xt/0Trxf/4MW/8AjtH/AAnH7G3/AETrxf8A+DFv/jtFwPjyivsP/hOP2Nv+ideL/wDwYt/8do/4Tj9jb/onXi//AMGLf/HaLgfHlFfYf/Ccfsbf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QAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAbfg/xhqXgjWodT0yYxTRn5l/hde6kdxX1AP2nPDf/AAh/9olm/tjZj+zcHO//AHsY2+9fIlFe9l2dYvLIyhQej6Po+68zro4qpQTUOpueMPGGpeONbm1PU5jLM5wq/wAKL2UDsKw6KK8WpUnVm5zd292cspOTu9wooorMQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQB7d+z/8Ata+NPgDM1nZzLrfha4O278P6id9tKp4YAHO0kdwPrmvcta+Afwt/a40e48R/Bi/g8K+NQvm3ngrUGEau3UmA9Bz0A4+lfD9XtE1zUPDeqW+paVez6df27h4rm2kMciMO4YHIpWA0fFngfXvh74kl0bxHpVzpGp28m2S3uUKkYPbsR7ivqb/goB/yKvwJ/wCxSh/9BSrnhH9rjwT8dvDtt4Q/aE0hbmWFNln40sIQLu3PYybBlh9Ac9x3rif24fi94M+JGteCtF8DahNrOi+FtHTTBqU0LReeQAMhWAPQeg5pdQPmSiiiqAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD//Z"/>
                            </pattern>
                        </defs>
                        <rect id="img_chat" width="674" height="541" fill="url(#pattern)"/>
                    </svg>
                </section>
            </section>
            <button id="start">Acceder aux Chat</button>
        </section>
    </main>

    <footer class="footer_index">
        <p>Développé par Cécile Wojnowski & Maxime Siegl</p>
    </footer>
</body>
<script src="ressources/js/index.js"></script>
</html>
