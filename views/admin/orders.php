<?php
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
require_once('C:\xampp\htdocs\tppr\controllers\OrdersController.php');
require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
 /* if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    $data = new OrdersController();
    $orders = $data->getAllOrders();
  }else{
    header('location: ./home.php');
     // Redirect::to("home");
  }*/
?>
<div class="container">
  <div class="row my-5">
    <div class="col-md-10 mx-auto">
        <div class="card bg-light p-3">
            <table class="table table-hover table-inverse">
                <h3 class="font-weight-bold">Commandes</h3>
                <thead>
                    <tr>
                        <th>Nom & Prénom</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                        <th>Effectuée le</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order) :?>
                    <tr>
                        <td><?php echo $order["Nom"];?></td>
                        <td><?php echo $order["produit"];?></td>
                        <td><?php echo $order["qte"];?></td>
                        <td><?php echo $order["prix"];?></td>
                        <td><?php echo $order["total"];?></td>
                        <td><?php echo $order["Date"];?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>