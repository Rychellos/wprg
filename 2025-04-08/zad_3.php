<?php
    function sequences_n($a, $q, $n) {
        echo "$a, $q, $n: ";

        if(!is_numeric($a) || !is_numeric($q) || !is_numeric($n)) {
            echo "Parameters must be numeric <br /><br />";
            return;
        }

        if($n <= 0) {
            echo "N must be positive number <br /><br />";
            return;
        }

        echo "Arithmetic: ";
        for ($i = 0; $i < $n; $i++) {
            echo $a + $i * $q;

            if($i + 1 < $n) {
                echo ", ";
            }
        }
        echo "<br />";

        echo "Geometric: ";
        for ($i = 0; $i < $n; $i++) {
            echo $a;
            
            $a *= $q;

            if($i + 1 < $n) {
                echo ", ";
            }
        }
        echo "<br /><br />";
    } 

    sequences_n(5, 2, 10);
    sequences_n(5, -2, 10);
    sequences_n(-5, 2, 10);
    sequences_n(5, 2.5, 5);
    sequences_n(5, 2.5, -10);
    sequences_n("start", 2, 10);
?>