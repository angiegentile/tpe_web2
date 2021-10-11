<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class HomeView{
    
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
    }


    function viewHome(){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', 'AQUAMOOD');
        $this->smarty->display('templates/home.tpl');

    }

    function viewAdminHome($categories, $products){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', 'AQUAMOOD - ADMIN');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/adminHome.tpl');

    }
    
}