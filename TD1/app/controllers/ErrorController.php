<?php

class ErrorController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    //Affiche une erreur 404 (page non trouvée)
    public function show404Action(){

    }

    //Affiche une erreur 401 (non autorisé), et propose la connexion
    public function show401Action(){

    }

    //Affiche une erreur 403 (Accès interdit), le rôle actuel ne permet pas d'accéder à la ressource
    public function show403Action(){

    }

    //Affiche une erreur 500 (Erreur interne du serveur)
    public function show500Action(){

    }


}

