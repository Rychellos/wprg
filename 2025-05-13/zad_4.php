<?php
$file = 'linki.txt';

if (!file_exists($file)) {
    echo "Plik z odnośnikami nie istnieje.";
    exit;
}

$rows = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

echo "<ul>";

foreach ($rows as $row) {
    $data = explode(';', $row);

    if (count($data) === 2) {
        $address = htmlspecialchars(trim($data[0]));
        $description = htmlspecialchars(trim($data[1]));

        echo "<li><a href=\"$address\" target=\"_blank\">$description</a></li>";
    }
}

echo "</ul>";