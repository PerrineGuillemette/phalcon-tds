<?php

class UserController extends \Phalcon\Mvc\Controller
{

    //Liste par défaut des utilisateurs, triés suivant sField dans l'ordre sens, en utilisant le filtre filter
    public function indexAction($sfield)
    {
        $users=User::find(
            [
                "order" => "$sfield ASC",
            ]
        );
        $this->view->setVar("users",$users);
        /*public function indexAction()
        {
            $this->persistent->searchParams = null;

            $this->view->form = new ProductsForm();
        }*/
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
        $user->setFirstname();
        $user->setLogin();
        $user->setLastname();
        $user->setEmail();
        $user->setImage();
        $user->setIdrole();
    }

    //Supprime l'utilisateur dont l'id est passé en paramètre
    public function deleteAction($id){
        $user = User::find(
            [
                "id = $id",
            ]
        );
        if ($user->delete() === false) {
            echo "La suppression a échouée \n";
        } else {
            echo "La suppression a été réalisée";
        }
    }

    //Gère le message de mise à jour et affiche la vue
    public function messageAction(){

    }

    public function createAction(){
        $user = new User();
        $user->setFirstname();
        $user->setLogin();
        $user->setLastname();
        $user->setEmail();
        $user->setImage();
        $user->setIdrole();


        // This record only must be created
        if ($user->create() === false) {
             echo "La création a échouée \n";
        } else {
            echo "Utilisateur crée avec succès";
        }
}

}