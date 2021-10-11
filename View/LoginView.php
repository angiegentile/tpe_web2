<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
class LoginView{
    private $smarty;
    function __construct()
    {
       $this->smarty= new Smarty(); 
    }

    function viewLogin(){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo','ingresar');
        $this->smarty->display('templates/login.tpl');
    }
    function toAdmin(){
        header("Location: ". BASE_URL."admin");
    }
    function toLogin(){
        header("Location: ". BASE_URL."login");
    }

}