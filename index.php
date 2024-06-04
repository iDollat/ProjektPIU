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
?>

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
            <li class="link"><a href="#home">Home</a></li>
            <li class="link"><a href="#exercises">Exercises</a></li>
            <li class="link"><a href="#bmi-calculator">BMI</a></li>
            <li class="link"><a href="#calorie-calculator">Calories</a></li>
            <li class="link"><a href="#" onclick="goToVerified()">Verification</a></li>
            <li class="link"><a href="#" onclick="goToMore()">More</a></li>
        </ul>

        <form method="post">
            <button type="submit" name="logout" class="btn">Log Out</button>
        </form>
    </nav>

    <header class="container" id="home">
        <div class="content">
            <span class="blur"></span>
            <h4>TRAIN LIKE A PRO</h4>
            <h1>We are <span class="animated" data-text="FittBase">FittBase</span></h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Maecenas eu tellus non est posuere posuere et nec odio.
                Curabitur fermentum eros quam, non feugiat nulla tristique id.
                Suspendisse at est mollis, vulputate ligula sed, posuere orci.
                Sed venenatis finibus nibh eget molestie. Sed condimentum enim
                sed tellus volutpat, a scelerisque nulla imperdiet. Aenean
                imperdiet fringilla maximus. Vestibulum ultrices, leo quis
                vehicula euismod, lorem odio aliquam sapien, quis dictum
                mauris orci at eros. 
            </p>
        </div>
        <div class="image">
            <img src="img/logo.png">
        </div>
    </header>

    <div class="container" id="exercises">
        
        <h2 class="title"><span class="animated" data-text="Exercises">Exercises</span></h2>
        <span class="blur"></span>
        <div class="exercises-container">
            <div class="headers">
                <h4>Front</h4>
                <h4>Back</h4>
            </div>
            <svg id="Front" width="300" height="400">
                <!-- glowa -->
                <path id="head" d="M 37 -105 L 41 -107 L 45 -105 L 46 -101 L 45 -96 L 41 -93 L 37 -96 L 36 -101 L 37 -105" fill="white" />
                <path id="Trapezius" d="M 38 -94 L 37 -92 L 35 -90 L 33 -89 L 31 -88 L 37 -88 L 40 -88 L 41 -89 L 38 -94 M 44 -94 L 45 -92 L 47 -90 L 49 -89 L 51 -88 L 45 -88 L 42 -88 L 41 -89 L 44 -94" fill="white" /><!--czworoboczne-->
                <path id="Shoulders" d="M 30 -88 L 28 -88 L 26 -87 L 25 -85 L 25 -82 L 26 -79 L 30 -82 L 29 -84 L 30 -88 M 52 -88 L 54 -88 L 56 -87 L 57 -85 L 57 -82 L 56 -79 L 52 -82 L 53 -84 L 52 -88" fill="white" /> <!--barki-->
                <path id="Chest" d="M 31 -87 L 39 -87 L 41 -83 L 40 -77 L 37 -76 L 32 -78 L 30 -82 L 31 -87 M 43 -87 L 51 -87 L 52 -82 L 50 -78 L 45 -76 L 42 -77 L 41 -83 L 43 -87" fill="white" /><!--klatka-->
                <path id="Biceps" d="M 30 -81 L 25 -77 L 23 -71 L 24 -69 L 27 -72 L 30 -78 L 30 -81 M 30 -78 L 30 -75 L 27 -69 L 26 -71 L 30 -78 M 52 -81 L 57 -77 L 59 -71 L 58 -69 L 55 -72 L 52 -78 L 52 -81 M 52 -78 L 52 -75 L 55 -69 L 56 -71 L 52 -78 M 52 -81 L 57 -77 L 59 -71 L 58 -69 L 55 -72 L 52 -78 L 52 -81" fill="white"/> <!--bicepsy-->
                <path id="Forearms" d="M 22 -70 L 23 -68 L 26 -69 L 27 -67 L 25 -63 L 23 -61 L 19 -54 L 17 -55 L 14 -54 L 18 -60 L 20 -68 L 22 -70 M 60 -70 L 62 -68 L 64 -60 L 68 -54 L 65 -55 L 63 -54 L 59 -61 L 57 -63 L 55 -67 L 56 -69 L 59 -68 L 60 -70" fill="white" />  <!--przedramiona-->
                <path id="Abs" d="M 32 -77 L 36 -75 L 35 -74 L 35 -63 L 33 -66 L 31 -74 L 32 -77 M 50 -77 L 46 -75 L 47 -74 L 47 -63 L 49 -66 L 51 -74 L 50 -77" fill="white" />  <!--zebra-->
                <path id="Abs" d="M 41 -77 L 38 -76 L 36 -74 L 36 -59 L 38 -52 L 41 -50 L 41 -77 M 41 -77 L 44 -76 L 46 -74 L 46 -59 L 44 -52 L 41 -50 L 41 -77" fill="white" />  <!--brzuch-->       
                <path id="Thighs" d="M 36 -59 L 33 -58 L 36 -51 L 39 -41 L 40 -49 L 38 -52
                M 32 -58 L 30 -54 L 30 -48 L 31 -37 L 33 -35 L 34 -40 L 35 -50 L 32 -58
                M 29 -48 L 28 -41 L 29 -31 L 32 -34 L 30 -37 L 29 -48
                M 36 -48 L 39 -39 L 36 -30 L 35 -30 L 34 -34 L 35 -39 L 36 -48
                M 33 -34 L 29 -30 L 29 -27 L 30 -25 L 33 -25 L 34 -28 L 33 -34 M 46 -59 L 49 -58 L 46 -51 L 43 -41 L 42 -49 L 44 -52 L 46 -59
                M 50 -58 L 52 -54 L 52 -48 L 51 -37 L 49 -35 L 48 -40 L 47 -50 L 50 -58
                M 53 -48 L 54 -41 L 53 -31 L 50 -34 L 52 -37 L 53 -48
                M 46 -48 L 43 -39 L 46 -30 L 47 -30 L 48 -34 L 47 -39 L 46 -48
                M 49 -34 L 53 -30 L 53 -27 L 52 -25 L 49 -25 L 48 -28 L 49 -34" fill="white" />  <!--Uda-->  
                <path id="Calves" d="M 28 -26 L 30 -23 L 28 -5 L 26 -5 L 27 -9 L 26 -19 L 26 -22 L 28 -26
                M 31 -24 L 33 -24 L 34 -21 L 33 -15 L 32 -12 L 29 -5 L 31 -24 M 54 -26 L 56 -22 L 56 -19 L 55 -9 L 56 -5 L 54 -5 L 52 -23 L 54 -26
                M 51 -24 L 49 -24 L 48 -21 L 49 -15 L 50 -12 L 53 -5 L 51 -24" fill="white"/><!--lydki-->           
            </svg>
            <svg id="Back" width="300" height="400">
                <path id="head" d="M 132 -109 L 128 -107 L 127 -103 L 129 -98 L 133 -95 L 137 -98 L 139 -103 L 138 -107 L 134 -109 L 132 -109" fill="white"/>      
                <path id="Trapezius" d="M 132 -94 L 129 -96 L 129 -94 L 128 -92 L 126 -91 L 123 -89 L 125 -87 L 127 -80 L 132 -74 L 132 -94 M 134 -94 L 137 -96 L 137 -94 L 138 -92 L 140 -91 L 143 -89 L 141 -87 L 139 -80 L 134 -74 L 134 -94" fill="white"/> <!--czworoboczne-->   
                <path id="Shoulders" d="M 122 -89 L 118 -88 L 115 -85 L 116 -80 L 121 -84 L 122 -89 M 144 -89 L 148 -88 L 151 -85 L 150 -80 L 145 -84 L 144 -89" fill="white"/> <!--barki-->
                <path id="Lats" d="M 123 -87 L 126 -79 L 132 -72 L 132 -71 L 124 -68 L 121 -79 L 121 -83 L 123 -87 M 134 -72 L 134 -71 L 142 -68 L 145 -79 L 145 -83 L 143 -87 L 140 -79 L 134 -72" fill="white"/> <!--najszersze-->        
                <path id="Lower back" d="M 132 -69 L 125 -67 L 125 -65 L 132 -55 L 132 -69 M 134 -69 L 141 -67 L 141 -65 L 134 -55 L 134 -69" fill="white"/> <!--ledzwia-->                
                <path id="Glutes" d="M 130 -56 L 133 -49 L 132 -45 L 123 -42 L 122 -46 L 122 -51 L 130 -56 M 136 -56 L 133 -49 L 134 -45 L 143 -42 L 144 -46 L 144 -51 L 136 -56" fill="white"/> <!--poslady-->  
                <path id="Hamstrings" d="M 122 -44 L 121 -40 L 121 -34 L 122 -31 L 122 -25 L 125 -29 L 125 -35 L 126 -42 L 123 -40 L 122 -44
                M 127 -42 L 130 -32 L 128 -20 L 126 -28 L 126 -36 L 127 -42
                M 128 -42 L 130 -43 L 132 -43 L 132 -37 L 131 -33 L 128 -42
                M 125 -28 L 126 -23 L 124 -21 L 123 -24 L 125 -28
                M 126 -21 L 127 -19 L 127 -8 L 125 -3 L 123 -7 L 123 -14 L 124 -18 L 126 -21
                M 122 -24 L 124 -20 L 123 -18 L 122 -14 L 122 -7 L 120 -5 L 120 -7 L 120 -14 L 122 -21 L 122 -24
                M 144 -44 L 145 -40 L 145 -34 L 144 -31 L 144 -25 L 141 -29 L 141 -35 L 140 -42 L 143 -40 L 144 -44
                M 139 -42 L 140 -36 L 140 -28 L 138 -20 L 136 -32 L 139 -42
                M 134 -43 L 136 -43 L 138 -42 L 135 -33 L 134 -37 L 134 -43
                M 141 -28 L 143 -24 L 142 -21 L 140 -23 L 141 -28
                M 144 -24 L 142 -20 L 143 -18 L 144 -14 L 144 -7 L 146 -5 L 146 -14 L 144 -21 L 144 -24
                M 140 -21 L 139 -19 L 139 -8 L 141 -3 L 143 -7 L 143 -14 L 142 -18 L 140 -21" fill="white"/> <!--Dwójki-->      
                <path id="Triceps" d="M 120 -82 L 116 -79 L 114 -71 L 115 -65 L 118 -75 L 120 -78 L 120 -82
                M 121 -78 L 119 -75 L 117 -68 L 119 -69 L 121 -72 L 121 -78 M 146 -82 L 146 -78 L 148 -75 L 151 -65 L 152 -70 L 150 -79 L 146 -82
                M 145 -78 L 145 -72 L 147 -69 L 149 -68 L 147 -75 L 145 -78" fill="white"/> <!--tricepsy-->   
                <path id="Forearms" d="M 113 -68 L 112 -65 L 111 -60 L 106 -52 L 109 -53 L 114 -65 L 113 -68
                M 118 -67 L 116 -65 L 115 -64 L 110 -53 L 110 -51 L 118 -64 L 118 -67
                M 148 -67 L 148 -64 L 156 -51 L 156 -53 L 151 -64 L 150 -65 L 148 -67
                M 153 -67 L 152 -65 L 157 -53 L 160 -52 L 155 -60 L 154 -64 L 153 -67" fill="white"/> <!--Przedriamiona-->         
                <path id="Calves" d="M 126 -21 L 127 -19 L 127 -8 L 125 -3 L 123 -7 L 123 -14 L 124 -18 L 126 -21
                M 122 -24 L 124 -20 L 123 -18 L 122 -14 L 122 -7 L 120 -5 L 120 -7 L 120 -14 L 122 -21 L 122 -24
                M 144 -24 L 142 -20 L 143 -18 L 144 -14 L 144 -7 L 146 -5 L 146 -14 L 144 -21 L 144 -24
                M 140 -21 L 139 -19 L 139 -8 L 141 -3 L 143 -7 L 143 -14 L 142 -18 L 140 -21" fill="white"/> <!--lydki-->
            </svg>
        </div>
        <div class="exercise-info">
            <div class="exercise-info-content">
                <ul id="exercise-list">
                <!-- Lista ćwiczeń będzie generowana dynamicznie tutaj -->
                </ul>
            </div>
        </div>
    </div>

    <section class="container" id="bmi-calculator">
        <span class="blur"></span>
        <h2><span class="animated" data-text="BMI">BMI </span><span class="animated" data-text="Calculator">Calculator</span></h2>
        <div class="bmi-form">
            <h2>Calculate your BMI</h2>
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" min="1" step="0.1">
            
            <label for="height">Height (cm):</label>
            <input type="number" id="height" min="1" step="0.1">
            
            <button class="btn" onclick="calculateBMI()">Calculate</button>
        </div>
        <div class="bmi-result" id="bmi-result">
            <!-- Wynik BMI -->
        </div>
    </section>

    <section class="container" id="calorie-calculator">
        <span class="blur"></span>
        <h2><span class="animated" data-text="Calorie">Calorie </span><span class="animated" data-text="Calculator">Calculator</span></h2>
        <div class="calorie-form">
            <h2>Calculate your estimated daily calorie requirement</h2>
            <label for="weight-cal">Weight (kg):</label>
            <input type="number" id="weight-cal" min="1" step="0.1">

            <label for="height-cal">Height (cm):</label>
            <input type="number" id="height-cal" min="1" step="0.1">

            <label for="age">Age:</label>
            <input type="number" id="age" min="1" step="1">

            <label for="gender">Gender:</label>
            <select id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="activity-level">Activity Level:</label>
            <select id="activity-level">
                <option value="1.2">Sedentary (little or no exercise)</option>
                <option value="1.375">Lightly active (light exercise 1-3 days a week)</option>
                <option value="1.55">Moderately active (moderate exercise 3-5 days a week)</option>
                <option value="1.725">Very active (intense exercise 6-7 days a week)</option>
                <option value="1.9">Extra active (very intense exercise or physical job)</option>
            </select>

            <button class="btn" onclick="calculateCalories()">Calculate</button>
        </div>
        <div class="calorie-result" id="calorie-result">
            <!-- Wynik kalkulatora kalorii -->
        </div>

    <script src="script.js"></script>
</body>
</html>