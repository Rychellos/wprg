<?php
$anwsers = ["Tak", "Nie", "Nie mam zdania"];
$voted = isset($_COOKIE['sonda']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$voted) {
    $choice = $_POST['anwser'] ?? null;
    if ($choice !== null) {
        setcookie("sonda", $choice, time() + 86400); // 24h
        $voted = true;
    }
}
?>

<?php if ($voted): ?>
    <h2>Dziękujemy za udział w sondzie!</h2>
    <p>Twój wybór: <strong><?php echo htmlspecialchars($_COOKIE['sonda']); ?></strong></p>
<?php else: ?>
    <form method="post">
        <h3>Czy lubisz PHP?</h3>
        <?php foreach ($anwsers as $odp): ?>
            <label><input type="radio" name="anwser" value="<?php echo $odp; ?>"> <?php echo $odp; ?></label><br>
        <?php endforeach; ?>
        <button type="submit">Głosuj</button>
    </form>
<?php endif; ?>