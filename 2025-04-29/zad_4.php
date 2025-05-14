<?php
$userText = $_GET["userText"];
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad 4</title>
    </style>
</head>

<body>
    <form action="./zad_4.php" method="get">
        <label for="userTest">Podaj napis:</label>
        <br />
        <input type="text" name="userText" id="userText" value="<?php echo isset($userText) ? $userText : "" ?>">
        <br />
        <input type="submit" value="Wykonaj">
    </form>

    <br />

    <?php
    const letters = ["a", "e", "i", "o", "u"];
    $vowels = 0;
    if (isset($userText)) {
        for ($i = 0; $i < strlen($userText); $i++) {
            if (in_array($userText[$i], letters)) {
                $vowels++;
            }
        }

        echo "Samogłosek: $vowels";
    }
    ?>
</body>

</html>