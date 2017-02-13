<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
        <script
                src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <script src="semantic/dist/semantic.min.js"></script>
    </head>
    <body>
        <div class="ui left icon input">
            <input type="submit" name="envoi" id="envoi" value="Nouvel utilisateur">
        </div>
        <div class="ui list">


            <table class="ui seven column table segment">

                <tr>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>Login</td>
                <td>Email</td>
                <td>Role</td>
                <td>Modifier</td>
                <td>Supprimer</td>
                </tr>

                <br>
                {% for user in users %}
                <tr>

                   <td>{{ user.firstname }}</td>
                    <td>{{ user.lastname }}</td>
                    <td>{{ user.login }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.idrole }}</td>
                    <td>{{ link_to("users/alter", "<i class='edit icon'") }}</td>
                    <td>{{ link_to("users/delete", "<i class='bordered red remove icon'") }}</td>
                    {% endfor %}

                </tr>
            </table>


        </div>

    </body>
</html>