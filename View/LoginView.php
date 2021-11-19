<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
class LoginView{
    private $smarty;
    function __construct()
    {
       $this->smarty= new Smarty(); 
    }

    function viewRegister(){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo','registrarse');
        $this->smarty->display('templates/registerForm.tpl');
    }
    function viewLogin($mensaje = ""){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo','ingresar');
        $this->smarty->assign('message', $mensaje);
        $this->smarty->display('templates/login.tpl');
    }
    function toAdmin(){
        header("Location: ". BASE_URL."admin");
    }
    function toLogin(){
        header("Location: ". BASE_URL."login");
    }
    
}