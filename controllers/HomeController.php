<?php

class HomeController{
    public function index($page){
        include($page.'.php');
    }
}
?>