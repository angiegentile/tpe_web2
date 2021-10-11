<?php
require_once './Model/LoginModel.php';
require_once './View/LoginView.php';
class LoginController{

    private $view;
    private $model;
function __construct()
{
    $this->view = new LoginView();
    $this->model = new LoginModel();
    
}

function showLogin(){
    $this->view->viewLogin();
}

function verifyLogin(){
 
    if(!empty($_POST['email'])&&!empty($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $this->model->getUser($email);
    if(password_verify($password, $user->password)){
        echo 'logueado';
        $this->view->toAdmin();
        session_start();
        $_SESSION['email']= $email; 
    }
    else{
        echo 'no logueado';
       header("Location: ". BASE_URL."login");
    }
}

}


function checkLoggedin(){
    session_start();
    if(!(isset($_SESSION['email']))){
        $this->view->toLogin();
    }

}

function logOut(){
    session_start();
    session_destroy();
    header("Location: ". BASE_URL."home");
}
}