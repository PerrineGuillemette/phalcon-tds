<?php

use Phalcon\Validation;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;

class User extends \Phalcon\Mvc\Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $image;
    protected $idrole;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function setIdrole($idrole)
    {
        $this->idrole = $idrole;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getIdrole()
    {
        return $this->idrole;
    }

    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    public function initialize()
    {
        $this->setSchema("phalcon-td0");
        $this->belongsTo('idrole', '\Role', 'id', ['alias' => 'Role']);
    }

    public function getSource()
    {
        return 'user';
    }

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
