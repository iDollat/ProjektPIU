<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitBase - Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="background-container">
        <div class="background-left"></div>
        <div class="background-right"></div>
    </div>

    <div class="logo-login-container">
        
        <div class="logo">
            <img src="img/logo.png" alt="FitBase Logo">
        </div>

        <div class="container" id="container">
            <div class="form-container sign-up">
                <form action="register.php" method="post">
                    <h1>Create Account</h1>
                    <input type="text" name="username" placeholder="Username">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form action="login.php" method="post">
                    <h1>Sign In</h1>
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <a href="#">Forgot Your Password?</a>
                    <button type="submit">Sign In</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome Back!</h1>
                        <p>Enter your personal details<br>
                            to use all of site features</p>
                        <button class="hidden" id="login">Sign In</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>You're New Here?</h1>
                        <p>Register Now!</p>
                        <button class="hidden" id="register">Sign Up</button>
                        <button onclick="goToHome()">back</button>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
