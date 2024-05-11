
<?php include('HeaderF.php');?>

  <!-- offer section -->
  <!-- dpanier-->

  <!-- <a href="panierL.html" class="link55">Panier <samp>8</samp></a> -->
  <a href="panierL.php" class="link55" >Panier</a>
  <section class="prod_liste">
    <form action="" class="produit">
      <div class="imagep">
        <img src="assets/images/image1s.jpg" alt="" srcset="">
      </div>
      <div class="contentm">
        <h4 class="name1">Math</h4>
        <h2 class="price">1h--> 14$ </h2>
        <a href="addpanier.php" name="b1" id="b1" class="idp">Ajouter au panier</a>
      </div>
    </form>
    <form action="" class="produit">
      <div class="imagep">
        <img src="admin/assets/images/image2s.jpg" alt="" srcset="">
      </div>
      <div class="contentm">
        <h4 class="name1">prog</h4>
        <h2 class="price">1h--> 14$ </h2>
        <a href="addpanier.php" class="idp">Ajouter au panier</a>
      </div>
    </form>
    
  </section>
   <!---fpanier-->
   <?php
include('Footer.php')
?>