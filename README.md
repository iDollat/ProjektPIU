# Projekt FitBase

FitBase to kompleksowa aplikacja internetowa stworzona w celu wspomagania użytkowników w prowadzeniu zdrowego stylu życia. Aplikacja oferuje szereg przydatnych funkcjonalności, takich jak kalkulatory BMI i zapotrzebowania kalorycznego, a także interaktywne poradniki ćwiczeń. Projekt został zrealizowany w technologiach: PHP, JavaScript, HTML i CSS.

## Funkcjonalności

### Rejestracja i logowanie

Aplikacja umożliwia użytkownikom rejestrację nowego konta. Po wypełnieniu formularza rejestracyjnego, użytkownik otrzymuje na podany adres e-mail kod weryfikacyjny, który musi wprowadzić w celu aktywacji konta. Zarejestrowani użytkownicy mogą następnie zalogować się do aplikacji.

### Weryfikacja konta

Po zarejestrowaniu, użytkownik jest przenoszony do sekcji weryfikacji konta. Musi tam wprowadzić otrzymany wcześniej kod weryfikacyjny, aby aktywować swoje konto. Dopiero po poprawnej weryfikacji będzie mógł w pełni korzystać z aplikacji.

### Kalkulator BMI

Aplikacja oferuje kalkulator BMI (Body Mass Index), który na podstawie wprowadzonej wagi i wzrostu oblicza wskaźnik masy ciała użytkownika oraz przypisuje go do odpowiedniej kategorii (niedowaga, waga prawidłowa, nadwaga, otyłość).

### Kalkulator zapotrzebowania kalorycznego

Użytkownik może również skorzystać z kalkulatora dziennego zapotrzebowania kalorycznego (TDEE - Total Daily Energy Expenditure). Kalkulator uwzględnia informacje o płci, wieku, wzroście, wadze oraz poziomie aktywności fizycznej użytkownika.

### Poradniki ćwiczeń

Aplikacja zawiera interaktywne obrazy przedstawiające partie mięśniowe człowieka (przód i tył). Po kliknięciu na daną partię ciała, użytkownik otrzymuje listę odpowiednich ćwiczeń wraz z linkami do poradników wideo na YouTube.

### Pasek postępu nawigacji

Pasek nawigacji na górze strony wyświetla pasek postępu, wskazujący, jak dużą część strony użytkownik już przewinął.

### Animowany tekst

Na stronie głównej znajduje się animowany tekst "WE ARE FITTBASE".

## Struktura plików

- `index.php` - Strona główna aplikacji
- `singup.php` - Strona rejestracji i logowania
- `verified.php` - Strona weryfikacji konta
- `more.php` - Strona z informacjami o twórcach aplikacji
- `script.js` - Plik JavaScript odpowiedzialny za różne funkcje, takie jak obsługa nawigacji, kalkulatory, animacje i interakcje z elementami SVG
- `style.css` - Główny plik CSS
- `login.css` - Plik CSS dla strony logowania
- `verify.css` - Plik CSS dla strony weryfikacji
- `more.css` - Plik CSS dla strony z informacjami o twórcach
- `db.php` - Plik połączenia z bazą danych
- `login.php` - Plik obsługujący logowanie użytkownika
- `register.php` - Plik obsługujący rejestrację nowego użytkownika oraz wysyłanie kodu weryfikacyjnego na adres e-mail

## Wymagania

Do poprawnego działania aplikacji wymagane są:

- Serwer Apache z zainstalowanym PHP
- Baza danych PostgreSQL
- Dostęp do konta e-mail (w celu wysyłania kodów weryfikacyjnych)

## Instalacja

1. Sklonuj repozytorium lub pobierz pliki projektu.
2. Umieść wszystkie pliki w katalogu serwera Apache (np. `/var/www/html/`).
3. Zaimportuj plik `db.sql` (nieuwzględniony w tym repozytorium) do bazy danych PostgreSQL.
4. Skonfiguruj plik `db.php` z właściwymi parametrami połączenia z bazą danych.
5. Skonfiguruj plik `register.php` z właściwymi parametrami konta e-mail, które będzie używane do wysyłania kodów weryfikacyjnych.

Po wykonaniu powyższych kroków, aplikacja powinna być gotowa do użytku.
