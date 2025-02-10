<?php
session_start();
session_unset();
session_destroy();
header("Location: sing_in.php");
?>