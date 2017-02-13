<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
    <script src="http://clement.barnab2.tk/js/jquery.js"></script>
    <script src="http://clement.barnab2.tk/semanticUI/semantic.min.js"></script>
    <script src="http://semantic-ui.com/javascript/library/tablesort.js"></script>
    <script src="http://clement.barnab2.tk/codiad/workspace/phalcon-tds/user-management/public/js/user.js"></script>
    </head>
    <body>
        <div class="ui basic button">
            <input type="submit" name="envoi" id="envoi" value="Nouvel utilisateur">
        </div>
        <div class="ui list">
            <table>
                <tr><?= $this->getContent() ?></tr></table>

        </div>

    </body>
</html>