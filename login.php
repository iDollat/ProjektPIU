<?php
$host = '195.150.230.208';
$port = '5432';
$dbname = '2023_chmura_daniel';
$user = '2023_chmura_daniel';
$password = 'Danielchmura22553307022002!';

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
            echo "<script>alert('Login successful');</script>";
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>