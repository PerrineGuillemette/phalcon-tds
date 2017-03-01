<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    //Appelle le formulaire de connexion(GET), soumission par POST vers login/auth
    public function indexAction($id=null)
    {
        $users = User::find();
        $this->view->setVar("user", $users);

    }

    //Établit une connexion d'utilisateur (instance de User mise en session) à partir du premier utilisateur
    // de type admin trouvé dans la base de données
    public function asAdminAction(){
        $admin=User::find(
            [
                "idrole= 1",
            ]
        );
        $this->session->set("id", $admin->getId());
        $this->session->set("login", $admin->getLogin());
        $this->session->set("firstname", $admin->getFirstname());
        $this->session->set("lastname", $admin->getLastname());
        $this->session->set("email", $admin->getEmail());
        $this->session->set("role", $admin->getIdrole()->getName());
    }

    //Établit une connexion d'utilisateur (instance de User mise en session) à partir du premier utilisateur
    // de type user trouvé dans la base de données
    public function asUserAction(){
        $user=User::find(
            [
                "idrole= 2",
            ]
        );
        $this->session->set("id", $user->getId());
        $this->session->set("login", $user->getLogin());
        $this->session->set("firstname", $user->getFirstname());
        $this->session->set("lastname", $user->getLastname());
        $this->session->set("email", $user->getEmail());
        $this->session->set("role", $user->getIdrole()->getName());
    }

    private function registerSession($user)
    {
        $this->session->set(
            "auth",
            [
                "id"   => $user->id,
                "name" => $user->firstname
            ]
        );
    }

    //Reçoit le résultat de la connexion et affiche son résultat (réussite ou non)
    public function authAction(){
        if ($this->request->isPost()) {
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            // Find the user in the database
            $user = User::findFirst(
                [
                    "login = $email ",
                    "password = $password"
                ]
            );

            if ($user !== false) {
                $this->registerSession($user);

                $this->flash->success(
                    "Welcome " . $user->firstname
                );
            }

            $this->flash->error(
                "Wrong email/password"
            );
        }

        // Forward to the login form again
        return $this->dispatcher->forward(
            [
                "controller" => "login",
                "action"     => "index",
            ]
        );
    }
}

