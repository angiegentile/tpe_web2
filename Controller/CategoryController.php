<?php

require_once './Model/CategoryModel.php';
require_once './View/CategoryView.php';
require_once './View/HomeView.php';
require_once 'LoginController.php';

class CategoryController{
    private $model;
    private $view;
    private $loginController;
  
    
    function __construct()
    {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->homeView = new HomeView();
        $this->loginController = new LoginController();
    }

    function showCategories(){

        $categories = $this->model->getCategories();
        $this->view->viewCategories($categories);

    }
    function showOneCategory($id){
        $category = $this->model->getCategory($id);
    
        $this->view->viewCategory($category);
    }
    function createCategory(){
        $this->loginController->checkLoggedin();
        if(isset($_POST["name"])&&isset($_POST["description"])&&(!empty($_POST["name"]))&&(!empty($_POST["description"]))){
            $this->model->addCategoryOnDB($_POST["name"],$_POST["description"]);
            $this->view->toAdmin();
        }
     
    }

    function deleteCategory($id){
        $this->loginController->checkLoggedin();
        $this->model->deleteCategoryFromDB($id);
        $this->view->toAdmin();
    }

    function showEditForm($id){
        $this->loginController->checkLoggedin();
       $categoria =  $this->model->getCategory($id);
       $this->view->viewEditForm($categoria);

    }

    function editCategory($id){
        $this->loginController->checkLoggedin();
        $this->model->updateCategoryOnDB($id);
        $this->view->toAdmin();
    }
    




}
