<?php
session_start();

if (isset($_POST['p1Score']) && isset($_POST['p2Score']) && isset($_POST['p3Score'])) {
    $_SESSION['p1Score'] = $_POST['p1Score'];
    $_SESSION['p2Score'] = $_POST['p2Score'];
    $_SESSION['p3Score'] = $_POST['p3Score'];
}
?>
