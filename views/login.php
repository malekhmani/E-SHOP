<?php

require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
  
    if(isset($_GET['result'])){
        $result=$_GET['result'];
        if($result=="cmdfailed"){
            include_once('includes/alerts/commandefailed.php');

        }elseif($result=="conf"){
            include_once('includes/alerts/signupfailed.php');

        }elseif($result=="comptecree"){
            include_once('includes/alerts/signupfailed.php');

        }
    }
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Connexion
                    </h3>
                </div>
                
                <div class="card-body">
                    <form method="post" action="index.php?action=auth&&controller=UsersController" class="mr-1">
                        <div class="form-group">
                            <input autocomplete="off" type="text" class="form-control" name="nom"
                            placeholder="Pseudo" id="">
                        </div>
                        <div class="form-group">
                            <input autocomplete="off" type="password" class="form-control" name="password"
                            placeholder="Mot de passe" id="">
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn btn-primary">
                                Connexion
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="http://localhost:82/tppr/views/register" class="btn btn-link">
                        Inscription
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>