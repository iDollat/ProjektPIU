<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FittBase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="style.css">
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
            <li class="link"><a href="#home" onclick="goToHome()">Main Page</a></li>
            <li class="link"><a href="#">More</a></li>
        </ul>

        <form method="post">
            <button type="submit" name="logout" class="btn">Log Out</button>
        </form>
    </nav>

    <script src="script.js"></script>
</body>
</html>
