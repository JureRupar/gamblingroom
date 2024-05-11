<?php
        session_start();

        $_SESSION["p1Score"];
        $_SESSION["p2Score"];
        $_SESSION["p3Score"];
        $_SESSION["p1"];
        $_SESSION["p2"];
        $_SESSION["p3"];
        $_SESSION["stevKoc"];
        $_SESSION["stevMet"];
        $_SESSION["stevVrz"];
        $max=$_SESSION["p1Score"];

        for($x=0;$x<3;$x++){
            if($max<$_SESSION["p2Score"])
                $max=$_SESSION["p2Score"];
            else if($max<$_SESSION["p3Score"]){
                $max=$_SESSION["p3Score"];
            }
        }
?>
<!DOCTYPE html>
<html lang="sl">
	<head>
        <title>IgralnaSoba></title>
		<meta charset="utf-8" >
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="slike/vijola.png">
        <script src="js/konec.js"></script>
	</head>
	<body onload="redirTimer()">
        <h1>Rezultati:</h1>
        <div id="center">
            <form name="Obrazec" id="Obrazec" method="post" autocomplete="off" action="igra.php">
                <div class="igralci">
                    <?php if($max==$_SESSION["p1Score"]){echo 'Zmagal si!';} ?></br>
                    <?php echo $_SESSION["p1"];  ?></br>
                    <?php echo $_SESSION["p1Score"];  ?></br>
                </div>
                <div class="igralci">
                    <?php if($max==$_SESSION["p2Score"]){echo 'Zmagal si!';} ?></br>
                    <?php echo $_SESSION["p2"];  ?></br>
                    <?php echo $_SESSION["p2Score"];  ?></br>
                </div>
                <div class="igralci">
                    <?php if($max==$_SESSION["p3Score"]){echo 'Zmagal si!';} ?></br>
                    <?php echo $_SESSION["p3"];  ?></br>
                    <?php echo $_SESSION["p3Score"];  ?></br>
                </div>
                <div class="Spodi">
                    Preusmeritev čez <span id="time">10</span> seconds.
                </div>
            </form>
        </div>
	</body>
</html>