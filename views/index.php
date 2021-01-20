<?php

require_once('..\controllers\routeur.php');
require_once('includes\header.php');


$routeur = new Routeur();
$routeur->routerRequete();
//;
require_once('includes\footer.php');