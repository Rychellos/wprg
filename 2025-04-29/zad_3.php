<?php
$userText = $_GET["userText"];
$functionSelect = $_GET["functionSelect"];
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad 3</title>
    <style>
        input,
        select {
            margin-bottom: 0.5rem;
        }

        form {
            border: 1px solid lightslategray;
            border-radius: 0.2rem;
            background-color: beige;
            padding: 4px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <form action="./zad_3.php" method="get">
        <label for="userTest">Podaj napis:</label>
        <br />
        <input type="text" name="userText" id="userText" value="<?php echo isset($userText) ? $userText : "" ?>">
        <br />
        <label for="functionSelect">Wybierz operację</label>
        <br />
        <select name="functionSelect" id="functionSelect">
            <option value="reverseOrder">Odwrócenie ciągu znaków</option>
            <option value="uppercase">Zamiana wszystkich liter na wielkie</option>
            <option value="lowercase">Zamiana wszystkich liter na małe</option>
            <option value="getLength">Liczenie liczby znaków</option>
            <option value="truncateWhitespaces">Usuwanie białych znaków z początku i końca ciągu</option>
        </select>
        <br />
        <input type="submit" value="Wykonaj">
    </form>

    <br />

    <?php
    if (isset($userText, $functionSelect)) {
        if ($userText == "") {
            echo "Proszę wprowadzić tekst oraz wybrać operację";
            die;
        }
        switch ($functionSelect) {
            case "reverseOrder":
                echo strrev($userText);
                break;
            case "uppercase":
                echo strtoupper($userText);
                break;
            case "lowercase":
                echo strtolower($userText);
                break;
            case "getLength":
                echo "Znaków: " . strlen($userText);
                break;
            case "truncateWhitespaces":
                echo trim($userText);
                break;
            default:
                echo "Nieprawidłowa operacja";
        }
    } else {
        echo "Proszę wprowadzić tekst oraz wybrać operację";
    }
    ?>
</body>

</html>