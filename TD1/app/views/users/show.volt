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
    <link rel="stylesheet" type="text/css" href="../../../semantic/dist/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="../../../semantic/dist/semantic.min.js"></script>
</head>
<body>
<div class="ui left icon input">
    <a class="ui basic button" href="{{url('users/index')}}">Retour à la liste</a>
</div><br><br><br>

        <div>
            <div class="two fields">
                <div class="field">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="Nom" value="{{ user.lastname }}">
                </div>
                <div class="field">
                    <label>Prenom</label>
                    <input type="text" name="prenom" placeholder="Prenom" value="{{ user.firstname }}">
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Login</label>
                    <input type="text" name="login" placeholder="Login" value="{{ user.login }}">
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="text" name="mail" placeholder="Email" value="{{ user.email }}">
            </div>
            <div class="field">
                <label>Role</label>
                    <input type="text" name="role" value="{{ user.getRole().getName() }}"
            </div>
            </div>
        </div>
</body>
</html>