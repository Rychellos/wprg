<?php
session_start();

$correctLogin = "admin";
$correctPassword = "haslo123";

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correctLogin = $_POST['login'];
    $password = $_POST['password'];

    if ($correctLogin === $correctLogin && $password === $correctPassword) {
        $_SESSION['loggedIn'] = true;
    } else {
        $blad = "Błędny login lub hasło!";
    }
}
?>

<?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
    <h2>Zalogowano poprawnie!</h2>
    <a href="?logout=1">Wyloguj</a>
<?php else: ?>
    <?php if (isset($blad))
        echo "<p style='color:red;'>$blad</p>"; ?>
    <form method="post">
        Login: <input type="text" name="login"><br>
        Hasło: <input type="password" name="password"><br>
        <button type="submit">Zaloguj</button>
    </form>
<?php endif; ?>