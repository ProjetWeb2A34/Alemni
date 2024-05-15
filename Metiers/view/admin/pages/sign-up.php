<?php
include_once "../../../controller/userC.php";
include_once "../../../model/user.php";
include_once "../../../config.php";

$userC = new UserC();

session_start();

$error = null;

if (
    isset($_POST['name']) &&
    isset($_POST['phone']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['role'])
) {
    // Debug: Print POST data
    error_log(print_r($_POST, true));
    if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['password'])) {
        $error = "All fields are required";
    } else {
        if (!preg_match("/^[a-zA-Z]+$/", $_POST['name'])) {
            $error = "Name can only contain letters";
        } elseif (strlen($_POST['name']) < 6) {
            $error = "Name must be at least 6 characters long";
        } elseif (strlen($_POST['password']) < 9) {
            $error = "Password must be at least 9 characters long";
        } elseif (!preg_match('/^\d{8}$/', $_POST['phone'])) {
            $error = 'Phone number must be 8 digits';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        } else {
            $user = new User(null, $_POST['name'], $_POST['phone'], $_POST['email'], $_POST['password'], $_POST['role']);
            try {
                $userC->adduser($user);
                $_SESSION['name'] = $_POST['name'];
                setcookie('name', $_POST['name'], time() + (86400 * 30), "/");
                $isadmin = false;
                if($_POST["role"] === "admin")
                {
                    $isadmin = true;
                }

                if ($isadmin) {
                  $_SESSION['name'] = $user['name'];
                  setcookie('name', $user['name'], time() + (86400 * 30), "/");
                  header('Location: dashboard.php');
                  exit; // Stop further execution
                } else {
                  $_SESSION['name'] = $_POST['name'];
                
                  header('Location: welcome.php');
                  exit; // Stop further execution
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
            }

        }

    }

    if ($error != null) {
        echo "<script>alert('" . $error . "')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet"/>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var error = "";

            if (!/^[a-zA-Z]+$/.test(name)) {
                error += "Name can only contain letters.\n";
            }

            if (name.length < 6) {
                error += "Name must be at least 6 characters long.\n";
            }

            if (password.length < 9) {
                error += "Password must be at least 9 characters long.\n";
            }

            if (!(/^\d{8}$/.test(phone))) {
                error += "Phone number must be 8 digits.\n";
            }

            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                error += "Invalid email format.\n";
            }

            if (error !== "") {
                alert(error);
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="">
<main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
        <br><br><br><br><br><br><br><br><br><br>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register </h5>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="post" onsubmit="return validateForm()">
                                <div class="mb-3">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                                           aria-label="Name" aria-describedby="name-addon">
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone"
                                           aria-label="Phone" aria-describedby="Phone-addon">
                                </div>
                                <div class="mb-3">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                           aria-label="Email" aria-describedby="email-addon">
                                </div>
                                <div class="mb-3">
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Password" aria-label="Password"
                                           aria-describedby="password-addon">
                                </div>
                        </div>
                        <div class="field">
                            <select name="role" required>
                                <option value="">Select ur role</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-check form-check-info text-left">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                    Conditions</a>
                            </label>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                        </div>
                        <p class="text-sm mt-3 mb-0">Already have an account? <a href="sign-in.php"
                                                                                 class="text-dark font-weight-bolder">Sign
                                in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
 
