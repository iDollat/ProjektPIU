<?php
$host = '195.150.230.208';
$port = '5432';
$dbname = '2023_chmura_daniel';
$user = '2023_chmura_daniel';
$password = 'Danielchmura22553307022002!';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
