<?php
session_start();
$_SESSION["pnr"] = "";
session_destroy();
header("Location: ../login.php");
?>