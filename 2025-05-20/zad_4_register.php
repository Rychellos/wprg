<?php
$file = 'users.txt';
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $password = $_POST['password'];

    $emailUsed = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Nieprawidłowy email!";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*\W).{6,}$/', $password)) {
        $message = "Hasło musi mieć min. 6 znaków, 1 wielką literę, cyfrę i znak specjalny.";
    } else {
        // Sprawdź unikalność emaila
        if (file_exists($file)) {
            $linie = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($linie as $linia) {
                $data = explode(';', $linia);
                if ($data[0] === $email) {
                    $emailUsed = true;
                    break;
                }
            }
        }

        if ($emailUsed) {
            $message = "Ten email jest już zarejestrowany.";
        } else {
            $newUser = "$email;$name;$surname;$password\n";
            file_put_contents($file, $newUser, FILE_APPEND);
            $message = "Rejestracja zakończona sukcesem!";
        }
    }
}
?>

<h2>Rejestracja</h2>
<form method="post">
    Imię: <input name="name"><br>
    surname: <input name="surname"><br>
    Email: <input name="email"><br>
    Hasło: <input type="password" name="password"><br>
    <button type="submit">Zarejestruj</button>
</form>
<p><?php echo $message; ?></p>