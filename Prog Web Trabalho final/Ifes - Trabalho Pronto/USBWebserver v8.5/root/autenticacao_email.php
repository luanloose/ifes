<?php
session_start();
//ini_set('error_reporting',E_ALL);
//ini_set('display_errors',1);
include "conexao.php";


//echo var_dump($_POST);
        $user = "".$_POST["username"].""; //Pega o e-mail informado pelo usu�rio
        settype($user, "string");
        $password = $_POST["password"]; // Pega a senha informada pelo usu�rio
        $bd = new Conexao(); //Cria uma nova conex�o com o banco de dados
		$login = $bd->sql_query("Select email, senha from colaboradores where email = '$user' and senha = '$password'; ");
        if (mysql_num_rows($login) == 1) { //Verifica se o e-mail e senha informados pelo usu�rio existem
          //se existir
			$_SESSION['login'] = $user; //Cria uma vari�vel de sess�o com o email do usu�rio
			$_SESSION['senha'] = $password; //Cria uma vari�vel de sess�o com a senha do usu�rio 		
		
			header("Location: caixa_entrada.php"); //Redireciona o usu�rio para a caixa de entrada do e-mail
		}
		else{ //Se o e-mail e senha estiverem incorretos, n�o permite o login do usu�rio e exibe uma mensagem
			 echo '<script type="text/javascript"> alert("Usu�rio ou senha incorretos!");document.location="login_email.php";</script>';	
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
		}	
?>
