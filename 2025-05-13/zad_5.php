<?php
$file = 'dozwolone_ip.txt';

$userIP = $_SERVER['REMOTE_ADDR'];

$IPlist = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$isAllowed = in_array($userIP, $IPlist);

if ($isAllowed) {
    echo "<h1>Witaj, użytkowniku specjalny!</h1>";
    echo "<p>Masz dostęp do treści premium.</p>";
} else {
    echo "<h1>Witaj, gościu!</h1>";
    echo "<p>To jest strona ogólna.</p>";
}