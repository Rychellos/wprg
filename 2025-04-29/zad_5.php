<?php
$userInput = $_GET["userInput"];
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad 5</title>
    </style>
</head>

<body>
    <form action="./zad_5.php" method="get">
        <label for="userTest">Podaj liczbę zmiennoprzecinkową:</label>
        <br />
        <input type="number" step="any" name="userInput" id="userInput"
            value="<?php echo isset($userInput) ? $userInput : "" ?>">
        <br />
        <input type="submit" value="Wykonaj">
    </form>

    <br />

    <?php
    if (isset($userInput)) {
        // Usunięcie białych znaków i zamiana przecinka na kropkę
        $userInput = str_replace(',', '.', trim($userInput));

        // Sprawdzenie, czy to prawidłowa liczba
        if (is_numeric($userInput)) {
            $parts = explode('.', $userInput);

            if (count($parts) == 2) {
                $decimalDigits = strlen(rtrim($parts[1], '0')); // rtrim usuwa końcowe zera
                echo "<p>Ilość cyfr po przecinku: $decimalDigits</p>";
            } else {
                echo "<p>Liczba nie zawiera części dziesiętnej.</p>";
            }
        } else {
            echo "<p>Nieprawidłowy format liczby.</p>";
        }
    }
    ?>
</body>

</html>