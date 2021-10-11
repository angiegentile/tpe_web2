<?php
require_once "./Model/ProductModel.php";
require_once "./View/ProductView.php";
require_once 'LoginController.php';

class ProductController{

    private $model;
    private $view;
    function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->loginController = new LoginController();
    }
    
    function showProducts(){
        $products = $this->model->getProducts();
        $this->view->viewProducts($products);
    }
    function showOneProduct($id){
        $product = $this->model->getProduct($id);
        $this->view->viewProduct($product);
    }
    function createProduct(){
        $this->loginController->checkLoggedin();
        if(isset($_POST["name"])&&(isset($_POST["description"]))&&(isset($_POST["price"]))&&(isset($_POST["category"]))&&(!empty($_POST["name"]))&&(!empty($_POST["description"]))&&(!empty($_POST["price"]))&&(!empty($_POST["category"]))){
           $this->model->addProductOnDB($_POST["name"],$_POST["price"],$_POST["description"], $_POST["category"]);
           $this->view->toAdmin();
           
        }

    }

    function deleteProduct($id){
        $this->loginController->checkLoggedin();
        $this->model->deleteProductFromDB($id);
        $this->view->toAdmin();
    }


    function showEditForm($id){
        $this->loginController->checkLoggedin();
        $producto = $this->model->getProduct($id);
   
        $this->view->viewEditForm($producto);
 
     }
 
     function editProduct($id){
        $this->loginController->checkLoggedin();
       $this->model->updateProductOnDB($id);
         $this->view->toAdmin();
     }
     

}