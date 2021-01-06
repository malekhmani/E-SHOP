<?php

class AdminController{
    public function index($page){
        include('admin/'.$page.'.php');
    }
}
?>