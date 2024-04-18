<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<?php


include_once '../../../Controller/ClassesC.php'; 
$classesC = new ClassesC();
//$classes = new Classes();
// $classesC->addClass();
$list = $classesC->listClasses();


/*
session_start();

if(isset($_COOKIE['PrenomUser'])) {
  // User is logged in
} else {

if(isset($_SESSION['PrenomUser'])) {
  // User is logged in
  setcookie('PrenomUser', $_SESSION['PrenomUser'], time() + (86400 * 30), "/");

} else {
  header("location: sign-in.php");
}
}*/
?>
<?php
include ('Header.php');
?>





  <!--Changed mt-5 to mt-4 to lower the buttons slightly less.
      Added a d-flex justify-content-center class to the parent div to ensure the buttons are horizontally centered.
      Removed the btn-block class from the buttons to make them display inline.
      Added mx-2 class to create space between the buttons horizontally.-->
    <div class="container mt-11">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center">
                <a href="ListClasse.php" class="btn btn-primary btn-lg mx-4">List Classes</a>
                <a href="AddClasse.php" class="btn btn-primary btn-lg mx-4">Add Class</a>
                <!--<a href="deleteClasse.php" class="btn btn-primary btn-lg mx-4">Delete Class</a>-->
                <!--<a href="UpdateClasse.php" class="btn btn-primary btn-lg mx-4">Update Class</a>-->
            </div>
        </div>
    </div>
</div>










<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include 'Footer.php';
?>
</body>

</html>