<?php

function numbers($num) {
    echo "$num: ";
    if(!is_numeric( $num )) {
        echo "Parameter must be numeric!";

        return;
    }

    $sum = 0;
    $str = (string)$num;

    $i = 0;
    while ($sum < 10 && $i < strlen($str)) {
        $sum += intval($str[$i++]);
    }

    echo "$sum <br />";
}

numbers(5210);
numbers(-5210);
numbers(5210.5);
numbers("numbers");

?>