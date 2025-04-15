<?php
function multiply_matrixes($matrix_1, $matrix_2) {
    $result = [];
    if(sizeof($matrix_1) != sizeof($matrix_2)) {
        return $result;
    }

    $size = floor(sqrt(sizeof($matrix_1)));

    for ($y = 0; $y < $size; $y++) {
        for ($x = 0; $x < $size; $x++) {
            $result[$y * $size + $x] = 0;
            for ($k = 0; $k < $size; $k++)  {
                $result[$y * $size + $x] += $matrix_1[$y * $size + $k] * 
                    $matrix_2[$k * $size + $x];

            }
        }
    }

    return $result;
}

$matrix_1 = [1, 2, 3, 4];
$matrix_2 = [5, 6, 7, 8];

$result = (multiply_matrixes($matrix_1, $matrix_2));

$size = floor(sqrt(sizeof($result)));

?>
<table>
    <?php for($y = 0; $y < $size; $y++) {?>
        <tr>
            <?php for($x = 0; $x < $size; $x++) {?>
                <td>
                    <?php echo $result[$y * $size + $x]?>
                </td>
            <?php }?>
        </tr>
    <?php }?>
</table>