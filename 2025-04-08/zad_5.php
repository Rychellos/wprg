<?php
    function is_pharagraph($string) {
        if(!is_string($string)) {
            return "Not a string";
        }

        $arr = [];

        for ($i=0; $i < strlen($string); $i++) { 
            if ($string[$i] != " " && !is_numeric($string[$i])) {
                $arr[strtolower($string[$i])] = true;
            }
        }

        if(count($arr) == 26) {
            return "true";
        }

        return "false";
    }

    echo is_pharagraph("The quick brown fox jumps over the lazy dog") . "<br />";
    echo is_pharagraph("Ala ma kota123456789") . "<br />";
    echo is_pharagraph(2137) . "<br />";
?>