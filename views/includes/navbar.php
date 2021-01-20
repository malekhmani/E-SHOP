
<?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost:82/tppr/views/">Mon Boutique E-commerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <?php if(!isset($_SESSION["admin"])):?>
        <a class="nav-link" href="http://localhost:82/tppr/views/">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:82/tppr/views/cart.php">
          Panier
          <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
            <?php echo  '<span style="
                background: #ff4c4f;
                position:relative;
                top: 0px;
                left:0px;" class="badge badge-notify">';
                echo $_SESSION["count"];?>
          <?php endif;?>
          </a>
      </li>
      <?php endif;?>
          <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true):?>
            <li class="nav-item">
            <a class="nav-link" href="http://localhost:82/tppr/views/admin/dashboard.php">Admin</a>
            </li>
            <?php endif;?>
          

        
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Compte
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="./register.php">Inscription</a>
          <a class="dropdown-item" href="./login.php">Connexion</a>
          </div>
           
          <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true):?>
           <!--<a class="dropdown-item" href="admin/dashboard.php">Admin <span class="sr-only">(current)</span></a>-->
           <a class="dropdown-item" href="./index.php?action=logout&&controller=UsersController">Déconnexion</a>

          <?php elseif(isset($_SESSION["logged"]) && $_SESSION["logged"] === true):?>
          <a class="dropdown-item" href="#"><?php echo "Welcom ".$_SESSION["nom"];?></a>
          <a class="dropdown-item" href="./index.php?action=logout&&controller=UsersController">Déconnexion</a>
         
          
          <?php elseif(!isset($_SESSION["logged"])&&(!isset($_SESSION["admin"]))):?>
          <a class="dropdown-item" href="./register.php">Inscription</a>
          <a class="dropdown-item" href="./login.php">Connexion</a>
          <?php endif;?>
          </div>
         
        
      </li>
     
    </ul>
  </div>
</nav>