<?php
$limit = 5;
if (isset($_POST['reset'])) {
    setcookie('counter', '', time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$counter = isset($_COOKIE['counter']) ? (int) $_COOKIE['counter'] + 1 : 1;
setcookie('counter', $counter, time() + 3600); // ważne 1 godz.

?>

<h2>Odwiedziłeś tę stronę <?php echo $counter; ?> razy.</h2>

<?php if ($counter >= $limit): ?>
    <p><strong>Osiągnąłeś limit <?php echo $limit; ?> odwiedzin!</strong></p>
<?php endif; ?>

<form method="post">
    <button type="submit" name="reset">Resetuj counter</button>
</form>