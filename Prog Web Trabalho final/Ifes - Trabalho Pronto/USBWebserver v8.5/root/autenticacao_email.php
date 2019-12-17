<?php
session_start();
//ini_set('error_reporting',E_ALL);
//ini_set('display_errors',1);
include "conexao.php";


//echo var_dump($_POST);
        $user = "".$_POST["username"].""; //Pega o e-mail informado pelo usuário
        settype($user, "string");
        $password = $_POST["password"]; // Pega a senha informada pelo usuário
        $bd = new Conexao(); //Cria uma nova conexão com o banco de dados
		$login = $bd->sql_query("Select email, senha from colaboradores where email = '$user' and senha = '$password'; ");
        if (mysql_num_rows($login) == 1) { //Verifica se o e-mail e senha informados pelo usuário existem
          //se existir
			$_SESSION['login'] = $user; //Cria uma variável de sessão com o email do usuário
			$_SESSION['senha'] = $password; //Cria uma variável de sessão com a senha do usuário 		
		
			header("Location: caixa_entrada.php"); //Redireciona o usuário para a caixa de entrada do e-mail
		}
		else{ //Se o e-mail e senha estiverem incorretos, não permite o login do usuário e exibe uma mensagem
			 echo '<script type="text/javascript"> alert("Usuário ou senha incorretos!");document.location="login_email.php";</script>';	
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
		}	
?>
