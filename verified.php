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

include 'db.php';

$email = $_SESSION['user_email'];

$stmt = $conn->prepare("SELECT verified, verification_code FROM project_psm.users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$showVerificationForm = !$result['verified'];

if (!empty($result)) {
    if ($result['verified']) {
        $message = "Verified user";
        $boxClass = "verified-box";
        $icon = '<i class="ri-check-line"></i>';
    } else {
        $message = "Unverified user";
        $boxClass = "unverified-box";
        $icon = '<i class="ri-close-line"></i>'; // Puste, jeśli użytkownik nie jest zweryfikowany
    }
} else {
    // Jeżeli użytkownik nie istnieje w bazie danych, możesz obsłużyć to według potrzeb
    $message = "Error: User does not exist";
    $boxClass = "unverified-box"; // Tutaj możesz ustawić odpowiednią klasę CSS dla komunikatu o błędzie
    $icon = ''; // Puste, jeśli użytkownik nie istnieje
}

if (isset($_POST['send_code'])) {
    $entered_code = $_POST['verification_code'];
    $db_code = $result['verification_code'];
    
    if ($entered_code == $db_code) {
        $stmt = $conn->prepare("UPDATE project_psm.users SET verified = true WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $message = "Valid verification code. User has been verified.";
        $boxClass = "verified-box";
        $icon = '<i class="ri-check-line"></i>'; // Dodaj ikonkę, jeśli użytkownik zostanie zweryfikowany
        $showVerificationForm = false;
    } else {
        $message = "Error: Verification code is invalid.";
        $boxClass = "unverified-box";
        $icon = ''; // Puste, jeśli kod weryfikacyjny jest nieprawidłowy
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
    <link rel="stylesheet" href="verify.css">
    <link rel="icon" href="img/logo.png">
</head>
<body>
    <nav class="nav">
        <div class="nav-logo">
            <a href="#home">
                <img src="img/logo.png" alt="Logo" />
            </a>
        </div>

        <ul class="nav-links">
            <li class="link"><a href="#home" onclick="goToHome()">Back to Home</a></li>
        </ul>

        <form method="post">
            <button type="submit" name="logout" class="btn">Log Out</button>
        </form>
    </nav>

    <div class="box <?php echo $boxClass; ?>">
        <?php echo $icon; ?>
        <?php echo $message; ?>
        <?php if ($showVerificationForm) { ?>
            <form class="verification-form" method="post">
                <input type="text" name="verification_code" placeholder="Enter verification code" required>
                <button type="submit" name="send_code" class="btn">Verify code</button>
            </form>
        <?php } ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
