<?php
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-4">
            <div class="card p-3 bg-danger">
                <div class="card-body">
                    <h3 class="card-text text-center">
                        <a href="../index.php?action=getAllProduct&&controller=AdminController"
                        style="text-decoration:none;color:white;font-weight:bold">Produits</a>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 bg-primary">
                <div class="card-body">
                    <h3 class="card-text text-center">
                        <a href="../index.php?action=getAllOrders&&controller=AdminController"
                        style="text-decoration:none;color:white;font-weight:bold">Commandes</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>