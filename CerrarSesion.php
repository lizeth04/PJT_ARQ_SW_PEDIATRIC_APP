<?php
session_start();
session_destroy();
header('location: ../view/index.php');
//include '';
exit();
?>