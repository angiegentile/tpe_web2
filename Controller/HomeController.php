

<?php

require_once './View/HomeView.php';
require_once 'LoginController.php';

class HomeController{

    private $view;
    private $categoryModel;
    private $productModel;
    private $loginController;
    function __construct()
    {
        $this->view =new HomeView();
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->loginController = new LoginController();
    }

    function showHome(){
        $this->view->viewHome();
    }
    
    function showAdminHome(){
        $this->loginController->checkLoggedin();
        $categories =  $this->categoryModel->getCategories();
        $products =$this->productModel->getProducts();
       $this->view->viewAdminHome($categories, $products);
    }



}




