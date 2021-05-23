<?php

require_once('includes\header.php');
if(isset($_GET['result'])){
    $result=$_GET['result'];
    if($result=="ups"){
        //include_once('./includes/alerts/updatsuccess.php');
        echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>
Product modified successfully!</strong> 
</div>';
    }    
    elseif($result=="pd"){
        //include_once('./includes/alerts/productdeleted.php');
        echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>
Product deleted successfully!</strong> 
</div>';
    }
    elseif($result=="pa"){
        include_once('includes/alerts/productadded.php');
    }
    
}
?>
<div class="container">

  <div class="row my-5">
    <div class="col-md-10 mx-auto">
    <div class="form-group">
    <a href="index.php?action=getAllCategories&&controller=AdminController" class="btn btn-primary btn-sm">Ajouter</a></div>
    
    <input type="hidden"name="ref_p" id="ref_p">
    </form>
  
        <div class="card bg-light p-3">
            <table class="table table-hover table-inverse">
                <h3 class="font-weight-bold">Produits</h3>
                <thead>
                    <tr>
                        <th>reference</th>
                        <th>Designation</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Photo</th>
                        <th>Tva</th>
                        <th>Resmie</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product) :?>
                    <tr>
                        <td><?php echo $product->ref_p;?></td>
                        <td><?php echo $product->designation;?></td>
                        <td><?php echo $product->qte_stock;?></td>
                        <td><?php echo $product->prix;?></td>
                        <td> <img src="admin/images/<?php echo $product->photo?>" width="50"height="50";></td>
                        <td><?php echo $product->tva;?></td>
                        <td><?php echo $product->remise;?></td>
                        <td><?php echo $product->categorie;?></td>
                        <td><?php echo substr($product->description,0,50)."....";?></td>
                        <td class="d-flex flex-row justify-content-center align-items-center">
                        <a href="index.php?action=getProductt&&controller=AdminController&&ref_p=<?php echo $product->ref_p;?>" class="badge badge-dark p-2"> Modifier </a>
                        <a href="index.php?action=removeProduct&&controller=AdminController&&id=<?php echo $product->ref_p;?>" class="badge badge-danger p-2"> Supprimer </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
<?php require_once('includes\footer.php');?>
