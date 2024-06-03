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

function goToLogin() {
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

// można zrobić z tych animowanych napisów coś w stylu progress bara