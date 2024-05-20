<?php
session_start();

// Retrieve scores and player names from session
$p1 = $_SESSION["p1Score"];
$p2 = $_SESSION["p2Score"];
$p3 = $_SESSION["p3Score"];

// Create an array with scores and names
$a1 = array(
    array($p1, $p2, $p3),
    array($_SESSION["p1"], $_SESSION["p2"], $_SESSION["p3"])
);

// Sort the array based on scores in descending order
array_multisort($a1[0], SORT_DESC, $a1[1]);
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Igralna Soba</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/gambling.png">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="jquery.fireworks.js"></script>
</head>
<body onload="redirTimer()">
    <div id="fireworks"></div>
    <h1>ČESTITKE</h1>
    <div id="center">
        <table>
            <tr>
                <td>
                    <div id="td1">
                        <h2>TRETJI</h2>
                        <h3><?php echo $a1[1][2]; ?></h3>
                        <h4><?php echo $a1[0][2] . " Points"; ?></h4>
                    </div>
                </td>
                <td>
                    <div id="td2">
                        <h2>PRVI</h2>
                        <h3><?php echo $a1[1][0]; ?></h3>
                        <h4><?php echo $a1[0][0] . " Points"; ?></h4>
                    </div>
                </td>
                <td>
                    <div id="td3">
                        <h2>DRUGI</h2>
                        <h3><?php echo $a1[1][1]; ?></h3>
                        <h4><?php echo $a1[0][1] . " Points"; ?></h4>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <h5 id="cnt">You can roll again in 10</h5>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const a = document.getElementById("cnt");
            let i = 10;
            setInterval(function() {
                i--;
                a.innerText = "You can roll again in " + i;
                if (i === 0) {
                    window.location.href = 'index.php';
                }
            }, 1000);

            function checkWinnerAndFireworks() {
                $('#fireworks').fireworks({
                    sound: false,
                    opacity: 0.9,
                    width: '100%',
                    height: '100%'
                });
            }

            checkWinnerAndFireworks();
        });
    </script>
</body>
</html>