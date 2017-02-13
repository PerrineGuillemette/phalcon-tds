<?php

use Phalcon\Mvc\Controller;

class UsersController extends Controller
{

    //Liste par défaut des utilisateurs, triés suivant sField dans l'ordre sens, en utilisant le filtre filter
    public function indexAction($sfield="firstname",$sene="asc",$filter=null)
    {
        $users=User::find(
            array("order"=>$sfield)
        );
        $this->view->setVar("users",$users);
    }

    //Formulaire de saisie/modification d'un utilisateur, id est la clé primaire de l'utilisateur à modifier
    public function formAction($id){
        $this->persistent->searchParams = null;
        $this->view->form = new ProductsForm();
    }

    //Met à jour l'utilisateur posté dans la base de données, puis affiche un message
    public function updateAction($id){
        $user = User::find(
            [
                "id = $id",
            ]
        );
        $user->setFirstname($_POST["firstname"]);
        $user->setLastname($_POST["lastname"]);
        $user->setEmail($_POST["mail"]);
        $user->setImage($_POST["image"]);
        $user->setIdrole($_POST["idrole"]);
    }

    //Supprime l'utilisateur dont l'id est passé en paramètre
    public function deleteAction($id){
        $user = User::find(
            [
                "id = $id",
            ]
        );
        if ($user->delete() === false)
            echo "La suppression a échouée \n";
        else
            echo "La suppression a été réalisée";
    }

    //Gère le message de mise à jour et affiche la vue
    public function messageAction(){

    }

    public function createAction(){
        $user = new User();
        $user->setFirstname($_POST["firstname"]);
        $user->setLastname($_POST["lastname"]);
        $user->setEmail($_POST["mail"]);
        $user->setImage($_POST["image"]);
        $user->setIdrole($_POST["idrole"]);

        if ($user->create() === false)
             echo "La création a échouée \n";
        else
            echo "Utilisateur crée avec succès";
    }

}
/*
exemple de linkTo sur un bouton :
{{linkTo("users/delete", "<i class='bordered red remove icon'>")}}
*/
