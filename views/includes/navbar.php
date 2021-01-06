
<?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost:82/tppr/views/">Welcome !! </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost:82/tppr/views/">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:82/tppr/views/cart.php">
          Panier
          <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
            (<?php echo $_SESSION["count"];?>)
          <?php else:?>
            (0)
          <?php endif;?>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Compte
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="http://localhost:82/tppr/views/register.php">Inscription</a>
          <a class="dropdown-item" href="http://localhost:82/tppr/views/login.php">Connexion</a>
          </div>
        <?php if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true):?>
          <a class="dropdown-item" href="#"><?php echo $_SESSION["nom"];?></a>
          <a class="dropdown-item" href="http://localhost:82/tppr/views/logout.php">Déconnexion</a>
          <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true):?>
           <a class="dropdown-item" href="http://localhost:82/tppr/views/admin/dashboard.php">Admin <span class="sr-only">(current)</span></a>
          <?php endif;?>
         
          <?php endif;?>
          
          
          <a class="dropdown-item" href="http://localhost:82/tppr/views/register.php">Inscription</a>
          <a class="dropdown-item" href="http://localhost:82/tppr/views/login.php">Connexion</a>
          
          </div>
         
        
      </li>
     
    </ul>
  </div>
</nav>