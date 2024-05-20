<?php
session_start();

if (isset($_POST["igraj"])) {
    $_SESSION["p1Score"] = 0;
    $_SESSION["p2Score"] = 0;
    $_SESSION["p3Score"] = 0;
    $_SESSION["p1"] = $_POST["up1"];
    $_SESSION["p2"] = $_POST["up2"];
    $_SESSION["p3"] = $_POST["up3"];
    $_SESSION["stevKoc"] = $_POST["stKock"];
    $_SESSION["stevMet"] = $_POST["stMetov"];
    $_SESSION["stevVrz"] = 0;
}

$p1Met = array();
$p2Met = array();
$p3Met = array();
for ($y = 0; $y < $_SESSION["stevKoc"]; $y++) {
    array_push($p1Met, rand(1, 6));
    array_push($p2Met, rand(1, 6));
    array_push($p3Met, rand(1, 6));
}

if ($_SESSION["stevVrz"] < $_SESSION["stevMet"]) {
    $_SESSION["stevVrz"]++;
    $_SESSION["p1Met"] = $p1Met;
    $_SESSION["p2Met"] = $p2Met;
    $_SESSION["p3Met"] = $p3Met;
    // Scores will be updated in JavaScript after the animation
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Igralna Soba</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="slike/vijola.png">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style>
        .kocke {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body onload="animateDice()">
    <h1>Vržene Kocke</h1>
    <div id="center">
        <form name="Obrazec" id="Obrazec" method="post" autocomplete="off" action="<?php echo $_SESSION["stevVrz"] == $_SESSION["stevMet"] ? 'konec.php' : 'igra.php'; ?>">
            <div class="igralci">
                <div id="p1">
                    <?php echo $_SESSION["p1"]; ?><br>
                    <span id="p1Score"><?php echo $_SESSION["p1Score"]; ?></span><br>
                    <?php for ($x = 0; $x < $_SESSION["stevKoc"]; $x++) { ?>
                        <img src='slike/dice<?php echo $p1Met[$x]; ?>.gif' alt='dice' class='kocke' id='p1dice<?php echo $x; ?>'>
                    <?php } ?><br>
                </div>
            </div>
            <div class="igralci">
                <div id="p2">
                    <?php echo $_SESSION["p2"]; ?><br>
                    <span id="p2Score"><?php echo $_SESSION["p2Score"]; ?></span><br>
                    <?php for ($x = 0; $x < $_SESSION["stevKoc"]; $x++) { ?>
                        <img src='slike/dice<?php echo $p2Met[$x]; ?>.gif' alt='dice' class='kocke' id='p2dice<?php echo $x; ?>'>
                    <?php } ?><br>
                </div>
            </div>
            <div class="igralci">
                <div id="p3">
                    <?php echo $_SESSION["p3"]; ?><br>
                    <span id="p3Score"><?php echo $_SESSION["p3Score"]; ?></span><br>
                    <?php for ($x = 0; $x < $_SESSION["stevKoc"]; $x++) { ?>
                        <img src='slike/dice<?php echo $p3Met[$x]; ?>.gif' alt='dice' class='kocke' id='p3dice<?php echo $x; ?>'>
                    <?php } ?><br>
                </div>
            </div>
            <div class="spodi">
                <input type="submit" id="gumb" value="<?php echo $_SESSION["stevVrz"] == $_SESSION["stevMet"] ? 'Rezultati' : 'Vrži'; ?>">
                <br>
                Met: <?php echo $_SESSION["stevVrz"]; ?>
            </div>
        </form>
    </div>
    <script>
        function animateDice() {
            var dice = document.querySelectorAll('.kocke');
            var interval = setInterval(function() {
                dice.forEach(function(die) {
                    var randomNum = Math.floor(Math.random() * 6) + 1;
                    die.src = 'slike/dice' + randomNum + '.gif';
                });
            }, 100);

            setTimeout(function() {
                clearInterval(interval);
                <?php for ($x = 0; $x < $_SESSION["stevKoc"]; $x++) { ?>
                    document.getElementById('p1dice<?php echo $x; ?>').src = 'slike/dice<?php echo $p1Met[$x]; ?>.gif';
                    document.getElementById('p2dice<?php echo $x; ?>').src = 'slike/dice<?php echo $p2Met[$x]; ?>.gif';
                    document.getElementById('p3dice<?php echo $x; ?>').src = 'slike/dice<?php echo $p3Met[$x]; ?>.gif';
                <?php } ?>

                // Update scores after the animation
                var p1Score = parseInt(document.getElementById('p1Score').textContent);
                var p2Score = parseInt(document.getElementById('p2Score').textContent);
                var p3Score = parseInt(document.getElementById('p3Score').textContent);

                <?php for ($x = 0; $x < $_SESSION["stevKoc"]; $x++) { ?>
                    p1Score += <?php echo $p1Met[$x]; ?>;
                    p2Score += <?php echo $p2Met[$x]; ?>;
                    p3Score += <?php echo $p3Met[$x]; ?>;
                <?php } ?>

                document.getElementById('p1Score').textContent = p1Score;
                document.getElementById('p2Score').textContent = p2Score;
                document.getElementById('p3Score').textContent = p3Score;

                // Save the updated scores in session using AJAX
                $.post('update_scores.php', {
                    p1Score: p1Score,
                    p2Score: p2Score,
                    p3Score: p3Score
                });
            }, 2000);
        }
    </script>
</body>
</html>