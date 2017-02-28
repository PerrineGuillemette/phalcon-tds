<?php

//Retourne vrai si un utilisateur est connecté
function isAuth($session){
    if ($this->session->has("name")) {
        return true;
}

//Retourne vrai si l'utilisateur connecté possède le rôle passé en paramètre
function hasRole($session, $role){
    if ($this->session->has("role") && $this->session->get("role")==$role) {
        return true;
    }
}


}
//Retourne la présentation de l'utilisateur connecté (login & email) ou l'info “non connecté” si aucun utilisateur n'est connecté
function infoUser($session){
    if ($this->session->has("login") && $this->session->has("email")){
        $login = $this->session->get("login");
        $email = $this->session->get("email");
        return $login+' '+$email;
    }
    else
        return 'non connecté';
}
