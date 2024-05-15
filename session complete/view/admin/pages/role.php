
<?php
include_once "../../../controller/userC.php";
include_once "../../../config.php";
session_start(); 

if (!isset($_SESSION['name'])) {

  header("location: sign-in.php");
  exit;
}


$valid_roles = ['student', 'teacher', 'admin'];
$selected_role = isset($_GET['role']) && in_array($_GET['role'], $valid_roles) ? $_GET['role'] : '';

if (!$selected_role) {
 
  echo "Invalid role selection.";
  exit;
}


switch ($selected_role) {
  case 'student':
    include 'student.php';
    break;
  case 'teacher':
    include 'teacher.php'; 
    break;
  case 'admin':
    include 'admin.php'; 
    break;
  default:

    echo "An unexpected error occurred.";
}
?>
