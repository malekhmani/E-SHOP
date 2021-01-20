<?php require_once('includes\header.php');
?>
<div class="container">
  <div class="row my-5">
    <div class="col-md-10 mx-auto">
        <div class="card bg-light p-3">
            <table class="table table-hover table-inverse">
                <h3 class="font-weight-bold">Commandes</h3>
                <thead>
                    <tr>
                    <th>Reference</th>
                        <th>Client</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Effectuée le</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order) :?>
                    <tr>
                    <td><?php echo $order->code;?></td>
                        <td><?php echo $order->client;?></td>
                        <td><?php echo $order->produit;?></td>
                        <td><?php echo $order->prix;?></td>
                        <td><?php echo $order->qte;?></td>
                        <td><?php echo $order->total;?></td>
                        <td><?php echo $order->Date;?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
<?php require_once('includes\footer.php');?>