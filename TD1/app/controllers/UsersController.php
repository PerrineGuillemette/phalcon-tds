<?php

use Phalcon\Mvc\Controller;

class UsersController extends Controller
{

    //Liste par défaut des utilisateurs, triés suivant sField dans l'ordre sens, en utilisant le filtre filter
    public function indexAction($sfield="firstname",$sens="asc",$filter=null)
    {
        $users=User::find(
            array("order"=>$sfield)
        );
        $this->view->setVar("users",$users);

    }

    //Formulaire de saisie/modification d'un utilisateur, id est la clé primaire de l'utilisateur à modifier
    public function formAction($id=null){
        $users = User::find(
            [
                "id= $id",
            ]
        );
        $this->view->setVar("users",$users);
    }

    public function formAjoutAction($id=null){
    }

    public function showAction($id=null){
        $user = User::findFirst(
            [
                "id= $id",
            ]
        );
        $this->view->setVar("user",$user);
    }

    //Met à jour l'utilisateur posté dans la base de données, puis affiche un message
    public function updateAction($id=null){
        if(isset($_POST["id"])) {
            $id = $_POST["id"];
            $user = User::findFirst(
                [
                    "id = $id"
                ]
            );

            $user->firstname=$_POST["prenom"];
            $user->lastname=$_POST["nom"];
            $user->email=$_POST["mail"];
            $user->idrole=$_POST["idrole"];

            if ($user->update() === false)
                echo "La modification a échouée \n";
            else
                echo "La modification a été effectuée";
        }
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

    public function createAction($id=null){
        $user = new User();
        $user->setFirstname($_POST["prenom"]);
        $user->setLastname($_POST["nom"]);
        $user->setEmail($_POST["mail"]);
        $user->setLogin($_POST["login"]);
        $user->setPassword($_POST["mdp"]);
        if(isset($_POST['image']))
            $user->setImage($_POST["image"]);
        $user->setIdrole($_POST["idrole"]);

        if ($user->create() === false)
             echo "La création a échouée \n";
        else
            echo "Utilisateur créé avec succès";
    }
}
