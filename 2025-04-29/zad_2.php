<?php
$userText = $_GET["userText"];
?>

<form action="./zad_2.php" method="get">
    <label for="userTest">Podaj napis:</label>
    <br />
    <input type="text" name="userText" id="userText" value="<?php echo isset($userText) ? $userText : "" ?>">
    <br />
    <input type="submit" value="Zatwierdź">
</form>

<?php
if (isset($userText)) {
    echo str_replace(["\\", "/", ":", "*", "?", "\"", "<", ">", "|", "+", "-"], "", $userText);
}
?>