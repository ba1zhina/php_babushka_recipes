<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: account.php");
    exit;
} else {
    header("Location: ../login.html");
    exit;
}
?>
