window.addEventListener('load', () => {
    const home = document.querySelector('#home')

    home.classList.add('active');
});
// Funkcja, która przewija do sekcji z uwzględnieniem offsetu (wysokości nawigacji)
function scrollToSectionWithOffset(sectionId) {
    const section = document.querySelector(sectionId);
    const navHeight = document.querySelector('.nav').offsetHeight;

    if (section) {
        // Przewijaj do sekcji z offsetem
        window.scrollTo({
            top: section.offsetTop - navHeight, // Odejmij wysokość nawigacji
            behavior: 'smooth' // Płynne przewijanie
        });
    }
}

// Dodaj nasłuchiwacze do linków w nawigacji
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); // Zapobiegaj domyślnemu zachowaniu linku
        const target = this.getAttribute('href'); // Pobierz cel
        scrollToSectionWithOffset(target); // Przewijaj do celu z offsetem
    });
});

function calculateCalories() {
    const weight = parseFloat(document.getElementById("weight-cal").value);
    const height = parseFloat(document.getElementById("height-cal").value) / 100;
    const age = parseInt(document.getElementById("age").value);
    const gender = document.getElementById("gender").value;
    const activityLevel = parseFloat(document.getElementById("activity-level").value);

    if (isNaN(weight) || isNaN(height) || isNaN(age) || height === 0) {
        document.getElementById("calorie-result").textContent = "Please enter valid information.";
        return;
    }

    let bmr; // Podstawowa przemiana materii

    if (gender === "male") {
        bmr = 10 * weight + 6.25 * height * 100 + 5 * age - 5;
    } else {
        bmr = 10 * weight + 6.25 * height * 100 + 5 * age - 161;
    }

    const tdee = bmr * activityLevel; // Całkowite dzienne zapotrzebowanie kaloryczne

    document.getElementById("calorie-result").textContent = "Your estimated daily caloric need is " + tdee.toFixed(0) + " kcal.";
}

function logOut() {
    window.location.href = "singup.php";
}

function goToHome() {
    window.location.href = "index.php";
}

function goToVerified() {
    window.location.href = "verified.php";
}

// Funkcje dla formularza rejestracji/logowania (jeśli występują w innych częściach strony)
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

if (registerBtn) {
    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });
}

if (loginBtn) {
    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });
}

// Funkcja kalkulująca BMI
function calculateBMI() {
    const weight = parseFloat(document.getElementById("weight").value);
    const height = parseFloat(document.getElementById("height").value) / 100;

    if (isNaN(weight) || isNaN(height) || height === 0) {
        document.getElementById("bmi-result").textContent = "Please enter valid weight and height.";
        return;
    }

    const bmi = weight / (height * height);
    let category = '';

    if (bmi < 18.5) {
        category = "Underweight";
    } else if (bmi < 24.9) {
        category = "Normal weight";
    } else if (bmi < 29.9) {
        category = "Overweight";
    } else {
        category = "Obesity";
    }

    document.getElementById("bmi-result").textContent = "Your BMI is " + bmi.toFixed(1) + ". Category: " + category + ".";
}

document.addEventListener('scroll', () => {
    // Całkowita wysokość dokumentu
    const totalHeight = document.body.scrollHeight;
    
    // Wysokość okna przeglądarki
    const windowHeight = window.innerHeight;
    
    // Aktualna pozycja przewinięcia
    const scrollPosition = window.scrollY;
    
    // Oblicz, jaki procent strony został przewinięty
    const scrolledPercent = (scrollPosition / (totalHeight - windowHeight)) * 100;

    // Znajdź pasek nawigacji
    const nav = document.querySelector('.nav');
    
    // Zaktualizuj dolną granicę jako progres w procentach
    nav.style.borderBottom = `3px solid #c2d700`; // Dodano grubość granicy, by była bardziej widoczna
    nav.style.borderImage = `linear-gradient(to right, #c2d700 ${scrolledPercent}%, transparent ${scrolledPercent}%) 1`; // Pasek progresu
});

document.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('.container'); // Pobierz wszystkie sekcje

    sections.forEach(section => {
        const rect = section.getBoundingClientRect(); // Położenie sekcji względem okna przeglądarki
        const isInViewport = rect.top < window.innerHeight * 0.5 && rect.bottom > window.innerHeight * 0.5; 

        if (isInViewport) {
            section.classList.add('active'); // Dodaj klasę, jeśli sekcja jest w widoku
        } else {
            section.classList.remove('active'); // Usuń klasę, jeśli sekcja nie jest w widoku
        }
    });
});

const exercises = {
    chest: ["Bench press", "Dumbell press", "Chest flyes"],
    trapezius:["Shrugs","Barbell Overhead Press"],
    shoulders:["Dumbbell Lateral Raise","Dumbell Overhead Press","Bent Over Dumbbell Reverse Fly","Barbell Upright Row","Rear Delt Dumbbell Row To Neck"],
    biceps: ["Biceps Curl","Close-Grip Chin-Ups","Standing Hammer Curl","Seated Hammer Curl","Incline Dumbbell Curl"],
    thighs:["Deep Squat","Dumbbell Squat","Front Squat","Hack Squat","Leg Extension","Barbell Lunge"],
    forearms:["Seated Barbell Wrist Curl","Reverse Grip Barbell Curl (EZ Bar)","Plate Pinch Carry","Behind-The-Back Barbell Wrist Curl"],// Dodaj inne części ciała i ich ćwiczenia tutaj
    abs:["Crunches","Bird Dogs","Leg Raises","Side Plank","Russian Twists"],
    calves:["Seated calf raise","Standing Barbell Calf Raise","Farmer’s Walk (on Tiptoes)"],
    lats:["Lat Pull Down","Straight Arm Lat Pull Down","Wide Grip Pull Up","Shotgun Row","V-Bar Pull Up","Underhand Close Grip Lateral Pulldown"],
    triceps:["EZ Bar Skullcrusher","Close Grip Bench Press","Weighted Tricep Dips","Straight Bar Tricep Extension","Lying Dumbbell Extension"],
    lowerback:["Superman","Smith Machine Deadlift","90/90 Hip Crossover"],
    glutes:["Hyperextension","Barbell Hip Thrust","Good Mornings","Wide Smith Machine Squat"],
    hamstrings:["Stiff Leg Deadlift","Conventional Deadlift","Leg Curl","Trap Bar Rack Pull"]
};

// Tablica linków do poradników na YouTube
const links = {
    chest: ["https://www.youtube.com/watch?v=8_33og5lN-Y", "https://www.youtube.com/watch?v=xDnm_FhewyI", "https://www.youtube.com/watch?v=Nhvz9EzdJ4U"],
    trapezius:["https://www.youtube.com/watch?v=Qb6Bd1J954o","https://www.youtube.com/watch?v=zQRcZjp3ZVI&t=369s"],
    shoulders:["https://www.youtube.com/watch?v=5g5U2dIoeQ0","https://www.youtube.com/watch?v=M2rwvNhTOu0","https://www.youtube.com/watch?v=evXOlgLTPCw","https://www.youtube.com/watch?v=um3VVzqunPU","https://www.youtube.com/watch?v=WiFxVCB50oo"],
    biceps: ["https://www.youtube.com/watch?v=ykJmrZ5v0Oo","https://www.youtube.com/watch?v=6bTcFTRoqcw","https://www.youtube.com/watch?v=CFBZ4jN1CMI","https://www.youtube.com/watch?v=BbxA1QF3TxY","https://www.youtube.com/watch?v=aTYlqC_JacQ"],
    thighs:["https://www.youtube.com/watch?v=oQ2qU4Cab0w","https://www.youtube.com/watch?v=v_c67Omje48","https://www.youtube.com/watch?v=uYumuL_G_V0","https://www.youtube.com/watch?v=0tn5K9NlCfo","https://www.youtube.com/watch?v=m0FOpMEgero","https://www.youtube.com/watch?v=_meXEWq5MOQ"],
    forearms:["https://www.youtube.com/watch?v=FW7URAaC-vE","https://www.youtube.com/watch?v=kTMJp7hILmk","https://www.youtube.com/watch?v=hnxTScazRs0","https://www.youtube.com/watch?v=xrS1UCC24do"],
    abs:["https://www.youtube.com/watch?v=MKmrqcoCZ-M","https://www.youtube.com/watch?v=wiFNA3sqjCA","https://www.youtube.com/watch?v=U4L_6JEv9Jg","https://www.youtube.com/watch?v=N_s9em1xTqU","https://www.youtube.com/watch?v=wkD8rjkodUI"],
    calves:["https://www.youtube.com/watch?v=3ZRe_QpvRPg","https://www.youtube.com/watch?v=3UWi44yN-wM","https://www.youtube.com/watch?v=XNDxCuY4l1U"],
    lats:["https://www.youtube.com/watch?v=JGeRYIZdojU","https://www.youtube.com/watch?v=G9uNaXGTJ4w","https://www.youtube.com/watch?v=7IV729pBFUc","https://www.youtube.com/watch?v=zVNSVxv8M8A","https://www.youtube.com/watch?v=ca95JZzzsGs","https://www.youtube.com/watch?v=VprlTxpB1rk"],
    triceps:["https://www.youtube.com/watch?v=jR7Y5YcugYc","https://www.youtube.com/watch?v=_g97w3QfD6E","https://www.youtube.com/watch?v=ynm9hhHJFEU","https://www.youtube.com/watch?v=LlBqt8dksdk","https://www.youtube.com/watch?v=ernSa92jYKc"],
    lowerback:["https://www.youtube.com/watch?v=h2iKcNldw-g","https://www.youtube.com/watch?v=p6KK6yHxd4k","https://www.youtube.com/watch?v=yYUD2GwXlI8"],
    glutes:["https://www.youtube.com/watch?v=ph3pddpKzzw","https://www.youtube.com/watch?v=L1qG25DhAk4","https://www.youtube.com/watch?v=YA-h3n9L4YU","https://www.youtube.com/watch?v=9O3lA9HsZU8"],
    hamstrings:["https://www.youtube.com/watch?v=CN_7cz3P-1U","https://www.youtube.com/watch?v=GxsLrTzyGUU","https://www.youtube.com/watch?v=vHMRcECLwFM","Trap Bar Rack Pullhttps://www.youtube.com/watch?v=p-EfiGOK7XQ"]
};

    // Dodaj inne części ciała i odpowiednie linki do nich tutaj

// Funkcja do obsługi kliknięć na elemencie SVG dla Front
function handleFrontClick(event) {
    if (event.target.tagName === "path") {
        const clickedPathId = event.target.id;
        const exerciseInfoDiv = document.querySelector(".exercise-info");
        // Sprawdź, czy istnieje lista ćwiczeń dla klikniętej części ciała
        if (exercises[clickedPathId]) {
            // Jeśli tak, wyświetl listę ćwiczeń w .exercise-info jako linki
            exerciseInfoDiv.innerHTML = "<h3>Ćwiczenia na " + clickedPathId + ":</h3><ul>" + exercises[clickedPathId].map((exercise, index) => {
                const link = links[clickedPathId][index];
                return "<li><a href='" + link + "' target='_blank'>" + exercise + "</a></li>";
            }).join("") + "</ul>";
        } else {
            // Jeśli nie, wyświetl informację o braku ćwiczeń
            exerciseInfoDiv.textContent = "Brak dostępnych ćwiczeń dla " + clickedPathId;
        }
    }
}

// Funkcja do obsługi kliknięć na elemencie SVG dla Back
function handleBackClick(event) {
    if (event.target.tagName === "path") {
        const clickedPathId = event.target.id;
        const exerciseInfoDiv = document.querySelector(".exercise-info");
        // Sprawdź, czy istnieje lista ćwiczeń dla klikniętej części ciała
        if (exercises[clickedPathId]) {
            // Jeśli tak, wyświetl listę ćwiczeń w .exercise-info
            exerciseInfoDiv.innerHTML = "<h3>Ćwiczenia na " + clickedPathId + ":</h3><ul>" + exercises[clickedPathId].map((exercise, index) => {
                const link = links[clickedPathId][index];
                return "<li><a href='" + link + "' target='_blank'>" + exercise + "</a></li>";
            }).join("") + "</ul>";
                  
        } else {
            // Jeśli nie, wyświetl informację o braku ćwiczeń
            exerciseInfoDiv.textContent = "Brak dostępnych ćwiczeń dla " + clickedPathId;
        }
    }
}

// Dodaj nasłuchiwacze zdarzeń dla Front i Back
const frontSVG = document.getElementById("Front");
frontSVG.addEventListener("click", handleFrontClick);

const backSVG = document.getElementById("Back");
backSVG.addEventListener("click", handleBackClick);

