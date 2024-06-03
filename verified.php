<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: singup.php");
    exit;
}

if (!isset($_SESSION['user_logged_in'])) {
    header("Location: singup.php");
}

$host = '195.150.230.208';
$port = '5432';
$dbname = '2023_chmura_daniel';
$user = '2023_chmura_daniel';
$password = 'Danielchmura22553307022002!';

$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
$email = $_SESSION['user_email'];
$stmt = $conn->prepare("SELECT verified, verification_code FROM project_psm.users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!empty($result)) {
    if ($result['verified']) {
        $message = "Użytkownik zweryfikowany";
        $boxClass = "verified-box";
    } else {
        $message = "Użytkownik niezweryfikowany";
        $boxClass = "unverified-box";
    }
} else {
    // Jeżeli użytkownik nie istnieje w bazie danych, możesz obsłużyć to według potrzeb
    $message = "Błąd: użytkownik nie istnieje";
    $boxClass = "unverified-box"; // Tutaj możesz ustawić odpowiednią klasę CSS dla komunikatu o błędzie
}

if (isset($_POST['send_code'])) {
    $entered_code = $_POST['verification_code'];
    $db_code = $result['verification_code'];
    
    if ($entered_code == $db_code) {
        $stmt = $conn->prepare("UPDATE project_psm.users SET verified = true WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $message = "Kod weryfikacyjny poprawny. Użytkownik został zweryfikowany.";
        $boxClass = "verified-box";
    } else {
        $message = "Błąd: Wprowadzony kod weryfikacyjny jest niepoprawny.";
        $boxClass = "unverified-box"; // Tutaj możesz ustawić odpowiednią klasę CSS dla komunikatu o błędzie
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FittBase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png">
    <style>
        .box {
            width: 300px;
            height: 200px; /* Zwiększyłem wysokość dla umieszczenia pola kodu */
            background-color: #f0f0f0;
            text-align: center;
            line-height: 150px;
            margin: 0 auto;
            margin-top: 100px;
            color: white; /* Nowy styl dla koloru tekstu */
        }

        .verified-box {
            background-color: green; /* Dodatkowo zmieniłem kolor tła dla lepszej widoczności */
        }

        .unverified-box {
            background-color: red; /* Dodatkowo zmieniłem kolor tła dla lepszej widoczności */
        }

        /* Nowy styl dla formularza */
        .verification-form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <div class="nav-logo">
            <a href="#home">
                <img src="img/logo.png" alt="Logo" />
            </a>
        </div>

        <ul class="nav-links">
            <li class="link"><a href="#home" onclick="goToHome()">Main Page</a></li>
            <li class="link"><a href="#">More</a></li>
        </ul>

        <form method="post">
            <button type="submit" name="logout" class="btn">Log Out</button>
        </form>
    </nav>

    <div class="box <?php echo $boxClass; ?>">
        <?php echo $message; ?>
        <?php if (!$result['verified']) { ?>
            <form class="verification-form" method="post">
                <input type="text" name="verification_code" placeholder="Wprowadź kod weryfikacyjny" required>
                <button type="submit" name="send_code" class="btn">Potwierdź kod</button>
            </form>
        <?php } ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
