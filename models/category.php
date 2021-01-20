<?php 
require_once('..\database\DB.php');
class category{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM categorie');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'category'); 
        //return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }}