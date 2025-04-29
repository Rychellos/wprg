<?php
// Form handling and calculation code
$inputNumber1 = $_GET['num1'];
$inputNumber2 = $_GET['num2'];
$inputNumber3 = $_GET['num3'];

$operation = $_GET['operation'];
$operation_advanced = $_GET['operation_advanced'];

if(isset($inputNumber1, $inputNumber2, $operation)) {
    switch ($operation) {
        case 'add':
            $result = $inputNumber1 + $inputNumber2;
            break;
        case 'subtract':
            $result = $inputNumber1 - $inputNumber2;
            break;
        case 'multiply':
            $result = $inputNumber1 * $inputNumber2;
            break;
        case 'divide':
            if ($inputNumber2 != 0) {
                $result = $inputNumber1 / $inputNumber2;
            }
            break;
    }
}

if(isset($inputNumber3, $operation_advanced)) {
    switch ($operation_advanced) {
        case 'cosinus':
            $result_advanced = cos(deg2rad($inputNumber3));
            break;
        case 'sinus':
            $result_advanced = sin(deg2rad($inputNumber3));
            break;
        case 'tangens':
            $result_advanced = tan(deg2rad($inputNumber3));
            break;
        case 'bintodec':
            $result_advanced = bindec($inputNumber3);
            break;
        case 'dectobin':
            $result_advanced = decbin($inputNumber3);
            break;
        case 'dectohex':
            $result_advanced = dechex($inputNumber3);
            break;
        case 'hextodec':
            $result_advanced = hexdec($inputNumber3);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <style>
            body {
                background-color: #161616;
                color: #cecece;
            }
            button {
                padding: 0.5em 2em;
            }
        </style>
    </head>
    <body>
        <h1>Kalkulator</h1>
        <hr />
        
        <h3>Prosty</h3>
        
        <form action="" method="get">
            <input type="text" name="num1" value="<?php echo $inputNumber1 ?>">
            <select name="operation">
                <option value="add">Dodawanie</option>
                <option value="subtract">Odejmowanie</option>
                <option value="multiply">Mnożenie</option>
                <option value="divide">Dzielenie</option>
            </select>
            <input type="text" name="num2" value="<?php echo $inputNumber2 ?>">
            
            <br />
            <br />
            
            <button type="submit">Oblicz</button>
            <?php echo isset($result) ? "<span style='margin-left: 2em'>Wynik: " . $result . "</span>" : ""; ?>
        </form>
        
        <hr />

        <h3>Zaawansowany</h3>

        <form action="" method="get">
            <input type="text" name="num3" value="<?php echo $inputNumber3 ?>">
            <select name="operation_advanced">
                <option value="cosinus" <?= (isset($_GET['operation_advanced']) && $_GET['operation_advanced'] === 'cosinus') ? 'selected' : '' ?>>Cosinus</option>
                <option value="sinus" <?= (isset($_GET['operation_advanced']) && $_GET['operation_advanced'] === 'sinus') ? 'selected' : '' ?>>Sinus</option>
                <option value="tangens" <?= (isset($_GET['operation_advanced']) && $_GET['operation_advanced'] === 'tangens') ? 'selected' : '' ?>>Tangens</option>
                <option value="bintodec" <?= (isset($_GET['operation_advanced']) && $_GET['operation_advanced'] === 'bintodec') ? 'selected' : '' ?>>Binarne na dziesiętne</option>
                <option value="dectobin" <?= (isset($_GET['operation_advanced']) && $_GET['operation_advanced'] === 'dectobin') ? 'selected' : '' ?>>Dziesiętne na binarne</option>
                <option value="dectohex" <?= (isset($_GET['operation_advanced']) && $_GET['operation_advanced'] === 'dectohex') ? 'selected' : '' ?>>Dziesiętne na szesnastkowe</option>
                <option value="hextodec" <?= (isset($_GET['operation_advanced']) && $_GET['operation_advanced'] === 'hextodec') ? 'selected' : '' ?>>Szesnastkowe na dziesiętne</option>
            </select>
            
            <br />
            <br />
            
            <button type="submit">Oblicz</button>
            <?php echo isset($result_advanced) ? "<span style='margin-left: 2em'>Wynik: " . $result_advanced . "</span>" : ""; ?>
        </form>
        
        <hr />
    </body>
</html>