<?php
function is_prime($n) {
    // Check for numbers less than 2
    if ($n < 2) {
        return false;
    }

    // Check divisibility up to square root of n
    $sqrt = sqrt($n);
    for ($i = 2; $i <= $sqrt; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }

    return true;
}

function print_primes($a, $b) {
    echo "$a, $b: ";
    // Check if both a and b are positive integers greater than zero
    if ($a <= 0 || $b <= 0) {
        echo "Start and stop must be positive numbers! Given $a, $b!<br />";
        return;
    }

    if(!is_numeric($a) || !is_numeric($b)) {
        echo "Start and stop must be numeric!<br />";
        return;
    }

    if($a > $b) {
        $a = $b ^ $a;
        $b = $a ^ $b;
        $a = $b ^ $a;
    }

    $printed = false;

    for ($i = round($a); $i <= $b; $i++) {
        if (is_prime($i)) {
            if ($printed) {
                echo ", ";
            }

            echo "$i";

            $printed = true;
        }
    }

    echo "<br />";
}

print_primes(5, 10);
print_primes(10, 5);
print_primes(5.5, 10);
print_primes(-5, 10);
print_primes("prime", 10);

?>