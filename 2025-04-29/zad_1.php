<?php
$userText = $_GET["userText"];
?>

<form action="./zad_1.php" method="get">
    <label for="userTest">Podaj napis:</label>
    <br />
    <input type="text" name="userText" id="userText" value="<?php echo isset($userText) ? $userText : "" ?>">
    <br />
    <input type="submit" value="Zatwierdź">
</form>

<?php
if (isset($userText)) {
    echo strtoupper($userText) . "<br />";
    echo strtolower($userText) . "<br />";
    echo ucfirst(strtolower($userText)) . "<br />";
    echo ucwords(strtolower($userText)) . "<br />";
}
?>