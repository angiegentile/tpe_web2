<?php

class LoginModel{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql: host=localhost;'.'dbname=bd_aquamood;charset=utf8','root','');   
    }

    function getUser($email){
        $sentencia = $this->db->prepare("select * from usuario where email=?");
        $sentencia->execute(array($email));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
 
        return $usuario;
    }
    function saveUser($email, $password){
        $sentencia = $this->db->prepare("INSERT INTO usuario(rol, email, password) VALUES(?, ?, ?)");
        $sentencia->execute(array("usuario", $email, $password));
    }



}