<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FittBase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="more.css">
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
    <div class="screen">
        <a class="box" target="_blank" href="https://github.com/SekjuRiczard">
        <img style="height:auto;" alt="View SekjuRiczard's full-sized avatar" src="https://avatars.githubusercontent.com/u/106740608?v=4" width="260" height="260" class="avatar avatar-user width-full border color-bg-default">
            <p>Dawid Osak</p>
        </a>
        <a class="box" target="_blank" href="https://github.com/dchmurek">
        <img style="height:auto;" alt="View dchmurek's full-sized avatar" src="https://avatars.githubusercontent.com/u/147102077?v=4" width="260" height="260" class="avatar avatar-user width-full border color-bg-default">
            <p>Daniel Chmura</p>
        </a>
        <a class="box" target="_blank" href="https://github.com/iDollat">
        <img style="height:auto;" alt="" src="https://avatars.githubusercontent.com/u/45768473?v=4" width="260" height="260" class="avatar avatar-user width-full border color-bg-default">
            <p>Kamil Szczebak</p>
        </a>
    </div>
    <script src="script.js"></script>
</body>
</html>