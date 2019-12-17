<?php
session_start();
session_destroy(); //Destrói as variáveis de sessão
header ("Location: login_email.php");
?>
