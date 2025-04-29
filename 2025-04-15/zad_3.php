<?php
function xd($a, $b, $c, $d) {
    $table = [];
    for ($i=$a; $i <= $b; $i++) { 
        $table[$i] = $i - $a <= $d ? $i - $a + $c : $d;
    }
    return $table;
}

var_dump(xd(2, 4, 4, 6));
?>