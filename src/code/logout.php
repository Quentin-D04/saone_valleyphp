<?php
session_start();
session_destroy();
header("Location: valid.php");
exit();
?>
