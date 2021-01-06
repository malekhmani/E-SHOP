<?php 
require_once('C:\xampp\htdocs\tppr\database\DB.php');
class category{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM categorie');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'category'); 
        //return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }}