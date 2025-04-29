<?php

function xd($numbers, $n) {
    if($n < 0 || $n >= sizeof($numbers)) {
        echo "BŁĄD";
        return;
    }
    $index = 0;
    return array_reduce($numbers, function ($prev, $current) use(&$index, $n) {
        if($index == $n) {
            array_push($prev, "$");
        }
        
        array_push($prev, $current);
        
        $index += 1;

        return $prev;
    }, []);
}

$start = [1, 2, 3, 4, 5];
echo "<br />";
var_dump(xd($start, 2));

?>