<?php
require_once "Controller/ProductController.php";
require_once "Controller/HomeController.php";
require_once "Controller/CategoryController.php";
require_once "Controller/LoginController.php";


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']. dirname($_SERVER['PHP_SELF']).'/');


if(!empty($_GET['action'])){
    $action = $_GET['action'];
}
else{
    $action = 'home';
}

$parametros = explode('/', $action);
$productController = new ProductController();
$homeController = new HomeController();
$categoryController = new CategoryController();
$loginController = new LoginController();
switch($parametros[0]){
    case 'home';
        $homeController->showHome();
        break;
    case 'showProducts';
        $productController->showProducts();
        break;
    case 'showOneProduct';
        $productController->showOneProduct($parametros[1]);
        break;
    case 'showCategories';
        $categoryController->showCategories();
        break;
    case 'showOneCategory';
        $categoryController->showOneCategory($parametros[1]);
        break;
    case 'admin';
       $homeController->showAdminHome();
       break;
    case 'createCategory';
        $categoryController->createCategory();
        break;
    case 'deleteCategory';
        $categoryController->deleteCategory($parametros[1]);
        break;
    case 'editCategoryForm';
        $categoryController->showEditForm($parametros[1]);
        break;
    case 'editCategory';
        $categoryController->editCategory($parametros[1]);
        break;
    case 'createProduct';
        $productController->createProduct();
        break;
    case 'deleteProduct';
        $productController->deleteProduct($parametros[1]);
        break;
    case 'editProductForm';
        $productController->showEditForm($parametros[1]);
        break;
    case 'editProduct';
        $productController->editProduct($parametros[1]);
        break;
    case 'login';
        $loginController->showLogin();
        break;
    case 'registerForm';
        $loginController->showRegisterForm();
        break;
    case 'register';
        $loginController->register();
        break;
    case 'verifyLogin';
        $loginController->verifyLogin();
        break;
    case 'logout';
        $loginController->logOut();
        break;
    default;
        echo 'error 404 not found';
} 

