<?php
session_start();
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);
 echo "logado como:". $_SESSION['login'];
?>