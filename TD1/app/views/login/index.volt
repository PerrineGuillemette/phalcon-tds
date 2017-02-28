<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>


<div class="container">
    <div class="panel-heading">
        <div class="panel-title text-center">
            <h1 class="title">Framework web</h1>
            <hr />
        </div>
    </div>

    <div class="main-login main-center">
        <form class="ui form" action="{{url('login//')}}" method="post">
            <div class="form-group">
                <label for="Numero" class="cols-sm-2 control-label">PersoPass</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="PersoPass" id="PersoPass" placeholder="Entrez votre PersoPass"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="mdp" class="cols-sm-2 control-label">Mot de passe</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Entrez votre mot de passe"/>
                    </div>
                </div>
            </div>

            <div class="login-register">
                <input type="submit" value="Connexion" name="connexion"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>