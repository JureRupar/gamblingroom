<?php
session_start();
$p1 = $_SESSION["p1Score"];
$p2 = $_SESSION["p2Score"];
$p3 = $_SESSION["p3Score"];
$a1 = array(
    array($p1, $p2, $p3),
    array($_SESSION["p1"], $_SESSION["p2"], $_SESSION["p3"])
);

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
    <script src="js/konec.js"></script>
</head>
<body>
    <div id="fireworks"></div>
    <h1>ČESTITKE</h1><br>
    <a id="cnt">Nazaj na začetek čez: 10</a>
    <script src="js/redirect_timer.js"></script>
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
    
</body>
</html>
