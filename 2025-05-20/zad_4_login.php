<?php
session_start();
$file = 'users.txt';

if (isset($_GET['logOut'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (file_exists($file)) {
        $rows = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($rows as $row) {
            list($z_email, $name, $surname, $correctPassword) = explode(';', $row);

            if ($z_email === $email && $password === $correctPassword) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['name'] = $name;
                break;
            }
        }
    }

    if (!isset($_SESSION['loggedIn'])) {
        $blad = "Błędne dane logowania.";
    }
}
?>

<?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
    <h2>Witaj, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
    <a href="?logOut=1">Wyloguj</a>
<?php else: ?>
    <?php if (isset($blad))
        echo "<p style='color:red;'>$blad</p>"; ?>
    <h2>Logowanie</h2>
    <form method="post">
        Email: <input name="email"><br>
        Hasło: <input type="password" name="password"><br>
        <button type="submit">Zaloguj</button>
    </form>
<?php endif; ?>