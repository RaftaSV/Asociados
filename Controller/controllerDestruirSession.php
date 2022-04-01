<?php

session_start();
session_destroy();
header("location:../view/Login.php");
?>