<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$host = '195.150.230.208';
$port = '5432';
$dbname = '2023_chmura_daniel';
$user = '2023_chmura_daniel';
$password = 'Danielchmura22553307022002!';

$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

function generateVerificationCode() {
    return str_pad(rand(1, 1000000), 7, "0", STR_PAD_LEFT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM project_psm.users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $error_message = 'Mail already used!';
    } else {
        $verification_code = generateVerificationCode();
        
        $encoded_password = base64_encode($password);
        
        $created_at = date('Y-m-d H:i:s');
        
        $stmt = $conn->prepare("SELECT * FROM project_psm.users WHERE verification_code = :verification_code");
        do {
            $verification_code = generateVerificationCode();
            $stmt->bindParam(':verification_code', $verification_code);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } while ($result);

        $stmt = $conn->prepare("INSERT INTO project_psm.users (login, password, email, verification_code) VALUES (:username, :password, :email, :verification_code)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $encoded_password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':verification_code', $verification_code);
        
        if ($stmt->execute()) {
            echo "<script>alert('User Created');</script>";

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "danielchmura722@gmail.com";
            $mail->Password = "ofle vhbo hsww efff";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->setFrom('danielchmura722@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Thanks for joining in!";
            $mail->Body = "We really appreciate it. Your verification code is: $verification_code";
            $mail->send();
        } else {
            echo "<script>alert('Error while creating user');</script>";
        }
    }
}

header("Location: singup.php?error=" . urlencode($error_message));
exit;
?>

