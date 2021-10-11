<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class CategoryView{
   
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
    }


    function viewCategories($categories){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', 'Categorías');
        $this->smarty->assign('items', $categories);
        $this->smarty->display('templates/categories.tpl');
    
    }
    
    function viewCategory($category){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $category['nombre']);
        $this->smarty->assign('items', $category['productos']);
        $this->smarty->display('templates/category.tpl');
    
    }
    
    function toAdmin(){
        header("Location: ". BASE_URL."admin");
    }

    function viewEditForm($category){
        
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', 'editar categoría');
        $this->smarty->assign('categoria', $category);
        $this->smarty->display('templates/editCategoryForm.tpl');
    }
}