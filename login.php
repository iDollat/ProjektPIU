<?php
session_start();

include "db.php";

$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM project_psm.users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        // Dekodujemy hasło z Base64
        $decoded_password = base64_decode($user['password']);
        
        if ($password == $decoded_password) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_email'] = $email;
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            $error_message = 'Incorrect username or password!';
            header("Location: singup.php?error=" . urlencode($error_message));
            exit;
        }
    } else {
        $error_message = 'Incorrect username or password!';
        header("Location: singup.php?error=" . urlencode($error_message));
        exit;
    }
}
?>
