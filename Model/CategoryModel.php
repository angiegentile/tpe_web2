<?php

class CategoryModel{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql: host=localhost;'.'dbname=bd_aquamood;charset=utf8','root','');
    }


    function getCategories(){
        $sentencia = $this->db->prepare("select * from categoria");
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }
    function getCategory($id){
        $sentencia = $this->db->prepare("select * from producto where id_categoria=?");
        $sentencia->execute(array($id));
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        $sentencia = $this->db->prepare("select * from categoria where id_categoria=?");
        $sentencia->execute(array($id));
        $categoria = $sentencia->fetch(PDO::FETCH_OBJ);
        $p = array();
        $p['nombre'] = $categoria->nombre;
        $p['descripcion'] = $categoria->descripcion;
        $p['id_categoria']=$categoria->id_categoria;
        $p['productos'] = $productos;
        

        return $p;
        
    }
    function addCategoryOnDB($name, $description){
        
            $sentencia = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES(?, ?)");
            $sentencia->execute(array($name, $description));
    
    }

    function deleteCategoryFromDB($id){
        $sentencia = $this->db->prepare("DELETE from categoria where id_categoria=?");
        $sentencia->execute(array($id));
    }

    function updateCategoryOnDB($id){
        $sentencia = $sentencia = $this->db->prepare("UPDATE categoria SET nombre=?, descripcion=? WHERE id_categoria=?");
        $sentencia->execute(array($_POST['name'], $_POST['description'],$id));
    }

}