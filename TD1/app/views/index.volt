<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <script
                src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="C:/wamp64/www/phalcon-tds/TD1/semantic/dist/semantic.min.js">
        <script
                src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <script src="C:/wamp64/www/phalcon-tds/TD1/semantic/dist/semantic.min.js"></script>
    </head>
    <body>
        <div class="ui basic button">
            <input type="submit" name="envoi" id="envoi" value="Nouvel utilisateur">
        </div>
        <div class="ui list">
            <table>
                <tr>{{ content() }}</tr></table>

        </div>

    </body>
</html>