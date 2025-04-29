<form action="zad_4.php" method="POST">
    <label>Imię:</label>
    <input type="text" name="name">
    <br />

    <label>Nazwisko:</label>
    <input type="text" name="lastname">
    <br />

    <label>Email:</label>
    <input type="text" name="email">
    <br />

    <label>Hasło:</label>
    <input type="password" name="password">
    <br />

    <label>Potwierdź hasło:</label>
    <input type="password" name="password_again">
    <br />

    <label>Wiek:</label>
    <input type="number" name="age">
    <br />

    <input type="submit" formaction="./zad_4.php" value="Zarejestruj się">
</form>

<?php
$name = isset($_POST["name"]) ? $_POST["name"] : '';
$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
$password_again = isset($_POST["password_again"]) ? $_POST["password_again"] : '';
$age = isset($_POST["age"]) ? $_POST["age"] : '';

if (!empty($name) || !empty($lastname) || !empty($email) || !empty($password) || !empty($password_again) || !empty($age)) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    echo "<tr><td>Imię</td><td>" . htmlspecialchars($name) . "</td></tr>";
    echo "<tr><td>Nazwisko</td><td>" . htmlspecialchars($lastname) . "</td></tr>";
    echo "<tr><td>Email</td><td>" . htmlspecialchars($email) . "</td></tr>";
    echo "<tr><td>Hasło</td><td>" . htmlspecialchars($password) . "</td></tr>";
    echo "<tr><td>Hasło ponownie</td><td>" . htmlspecialchars($password_again) . "</td></tr>";
    echo "<tr><td>Wiek</td><td>" . htmlspecialchars($age) . "</td></tr>";

    echo "</table>";
}
?>