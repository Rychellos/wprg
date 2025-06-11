<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
</head>

<body>
    <form action="zad_1.php" method="GET">
        <label for="userDate">Proszę wybrać datę urodzenia:</label>
        <br />
        <input type="date" name="userDate" id="userDate" />
        <br />
        <input type="submit" value="Wyślij">
    </form>
    <?php
    date_default_timezone_set("Poland/Polska");

    function date_pl($string)
    {

        $string = str_replace('Monday', 'poniedziałek', $string);
        $string = str_replace('Tuesday', 'wtorek', $string);
        $string = str_replace('Wednesday', 'środa', $string);
        $string = str_replace('Thursday', 'czwartek', $string);
        $string = str_replace('Friday', 'piątek', $string);
        $string = str_replace('Saturday', 'sobota', $string);
        $string = str_replace('Sunday', 'niedziela', $string);

        return $string;
    }

    if (isset($_GET["userDate"])) {
        $userDate = $_GET["userDate"];

        $time = strtotime($userDate);

        echo date_pl(date("l", $time));
    }
    ?>
</body>

</html>