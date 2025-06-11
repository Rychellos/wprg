<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
</head>

<body>
    <form action="zad_2.php" method="GET">
        <label for="userPath">Proszę wybrać ścieżkę</label>
        <br />
        <input type="text" name="userPath" id="userPath" />
        <br />

        <label for="userFolder">Proszę wybrać folder</label>
        <br />
        <input type="text" name="userFolder" id="userFolder" />
        <br />

        <label for="userOperation">Proszę wybrać operację</label>
        <br />
        <select name="userOperation" id="userOperation">
            <option value="read" selected>Odczytaj</option>
            <option value="delete">Usuń</option>
            <option value="create">Utwórz</option>
        </select>
        <br />

        <input type="submit" value="Wyślij">
    </form>
    <?php

    function normalize_path($path)
    {
        $parts = preg_split(":[\\\/]:", $path); // split on known directory separators
    
        // resolve relative paths
        for ($i = 0; $i < count($parts); $i += 1) {
            if ($parts[$i] === "..") {          // resolve ..
                if ($i === 0) {
                    throw new Exception("Cannot resolve path, path seems invalid: `" . $path . "`");
                }
                unset($parts[$i - 1]);
                unset($parts[$i]);
                $parts = array_values($parts);
                $i -= 2;
            } else if ($parts[$i] === ".") {    // resolve .
                unset($parts[$i]);
                $parts = array_values($parts);
                $i -= 1;
            }
            if ($i > 0 && $parts[$i] === "") {  // remove empty parts
                unset($parts[$i]);
                $parts = array_values($parts);
            }
        }
        return implode("/", $parts);
    }
    function easyFunction($path, $folderName, $operation = "read")
    {
        switch ($operation) {
            case "delete":
                if (!is_dir(normalize_path("./" . $path))) {
                    echo "Nieprawidłowa ścieżka";
                    return;
                }

                rmdir(normalize_path("./" . $path . $folderName));

                $dirs = scandir(normalize_path("./" . $path));

                if (count($dirs) < 2) {
                    rmdir(normalize_path("./" . $path));
                }

                break;
            case "create":
                if (!is_dir($path)) {
                    mkdir($path);
                }

                if (mkdir(normalize_path($path . "/" . $folderName))) {
                    echo "Pomyślnie utworzono: " . normalize_path("./" . $path . "/" . $folderName);
                } else {
                    echo "Nie udało się utworzyć: " . normalize_path("./" . $path . "/" . $folderName);
                }

                break;
            default:
                if (!is_dir(normalize_path("./" . $path))) {
                    echo "Nieprawidłowa ścieżka";
                    return;
                }

                $dirs = scandir(normalize_path("./" . $path));

                echo "<ol>";
                for ($i = 0; $i < count($dirs); $i++) {
                    if ($dirs[$i] != "." && $dirs[$i] != "..")
                        echo "<li>" . $dirs[$i] . "</li>";
                }
                echo "</ol>";

                break;
        }
    }

    if (isset($_GET["userPath"], $_GET["userFolder"], $_GET["userOperation"])) {
        easyFunction($_GET["userPath"], $_GET["userFolder"], $_GET["userOperation"]);
    }
    ?>
</body>

</html>