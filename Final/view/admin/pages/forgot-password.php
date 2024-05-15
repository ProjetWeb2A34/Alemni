<?php
require_once ('../../../vendor/autoload.php');
require_once ('../../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
include_once "../../../controller/userC.php";
include_once "../../../model/user.php";

include_once "../../../config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$db = new PDO('mysql:host=localhost;dbname=webapp', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $db->prepare('SELECT * FROM user WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate a new random password
        $newPassword = bin2hex(random_bytes(5)); // This will generate a 10 character long random string

        // Update user record with new password
        // Make sure to hash the password before storing it, this is just a simple example
        $stmt = $db->prepare('UPDATE user SET password = ? WHERE email = ?');
        $stmt->execute([$newPassword, $email]);

        // Send password reset email
        $to = $email;
        $subject = "Password Reset";
        $message = "Your new password is: $newPassword";
        $headers = "From: contact@alamnistudy.com";



        // Load HTML content from file
        $htmlContent = file_get_contents('email.html');

        // Replace placeholder in the HTML content with the new password
        $htmlContent = str_replace('{{password}}', $newPassword, $htmlContent);

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'safahajji9@gmail.com'; // Make sure this is correct
        $mail->Password = 'pcqa pljq xrce jmkx'; // Make sure this is correct
        $mail->SMTPSecure = 'tls';
        $mail->Port = 25;

        $mail->setFrom($email);
        $mail->addAddress($to);

        // Set email format to HTML
        $mail->isHTML(true);

        $mail->Subject = 'Password Reset';
        $mail->Body = $htmlContent;

        $mail->SMTPOptions = [
            'ssl' => [
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            ]
          ];

        try {
            $mail->send();
            echo 'New password has been sent to your email.';

            header('Location: ./sign-in.php');
            // Replace 'path/to/signin.php' with the actual path to your sign-in page
            exit;
        } catch (Exception $e) {
            echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        echo "No user with that email address exists.";
    }
}