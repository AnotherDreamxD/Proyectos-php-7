<?php

require_once('modeloBase.php');
class Usuario extends ModeloBase
{

    public $nombre;
    public $apellidos;
    public $email;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }
    
    function getNombre()
    {
        return $this->nombre;
    }
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getApellidos()
    {
        return $this->apellidos;
    }
    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    function getEmail()
    {
        return $this->email;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }

    function getPassword()
    {
        return $this->password;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }

}
