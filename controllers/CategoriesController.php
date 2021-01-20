<?php
require_once('..\models\category.php');

class CategoriesController{
    public function getAllCategories(){
        $categories = category::getAll();
        //return $categories;
        require ('home.php');
    }
    
        public function getAllCategorie(){
            $categories = category::getAll();
            return $categories;
            //require ('C:\xampp\htdocs\tppr\views\home.php');
        }
}