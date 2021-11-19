<?php
require_once './Model/LoginModel.php';
require_once './View/LoginView.php';
require_once './View/HomeView.php';
class LoginController{

    private $view;
    private $model;
    private $homeView;
function __construct()
{
    $this->view = new LoginView();
    $this->model = new LoginModel();
    $this->homeView = new HomeView();
}

function showLogin(){
    $this->view->viewLogin();
}
function showRegisterForm(){
    $this->view->viewRegister();
}

function register(){
   
    if(!empty($_POST['email'])&&!empty($_POST['password'])){
       
        $email = $_POST['email'];
        $password =password_hash($_POST['password'],PASSWORD_BCRYPT);
        
        $this->model->saveUser($email, $password);
        $this->homeView->viewHome('usuario registrado exitosamente!');
     
    }
    
}

function verifyLogin(){
 
    if(!empty($_POST['email'])&&!empty($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $this->model->getUser($email);
if($user){
    if(password_verify($password, $user->password)){
        $this->view->toAdmin();
        session_start();
        $_SESSION['email']= $email; 
        $_SESSION['rol']= $user->rol;
    }
    else{
     
        $this->view->viewLogin('vuelva a chequear los datos');
    }
}
else{
     
    $this->view->viewLogin('usuario inexistente');
}
}

}


function checkLoggedin(){
    session_start();
    if(!(isset($_SESSION['email']))){
        if($_SESSION['rol']=="administrador"){
        $this->view->toLogin();
        die();
        }
    }

}

function logOut(){
    session_start();
    session_destroy();
    header("Location: ". BASE_URL."home");
}
}