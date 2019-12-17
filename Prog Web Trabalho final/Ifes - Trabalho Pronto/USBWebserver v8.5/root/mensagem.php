<html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">



<?php	
	session_start();
	if($_SESSION['login']== ""){
	header ("location: login_email.php");	
}
	
	include "curso_ctr.php";
	
		
	  	 
?>

<?php
	include "head.php";
?>
<body>
    <div id="wrapper">
		<?php
			include "menu.php";
		?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">BOLSISTAS</h1>
							
		
                        <h1 class="page-subhead-line">
						
						<?php
			$id_mensagem = $_GET['id']; 	//Pega o id da mensagem		
			$bd = new Conexao(); // Cria uma nova conexão com o banco de dados
			$rg = $bd->sql_query("Select * from mensagens where idmsg = $id_mensagem ; "); //Pega tudo referente a mensagem
			$res = mysql_fetch_array($rg);
			$pessoa_remetente = $bd->sql_query("Select email from colaboradores where idcolab = $res[Colaboradores_idcolab]; "); //Pega o e-mail do usuário que enviou a mensagem
			$email_remetente = mysql_fetch_array($pessoa_remetente);
			$pessoa_destino = $bd->sql_query("Select email from colaboradores where idcolab = $res[iddestino]; "); // Pega o e-mail do usuário que recebeu a mensagem
			$email_destino = mysql_fetch_array($pessoa_destino);
			$email_report ="O contato". $pessoa_destino['email'] ." leu o e-mail que voc&ecirc; enviou. "."<br>"."Conte&uacute;do do e-mail abaixo: "."<br>"."Assunto: ". $res['assunto']."<br>"."Texto: ".$res['texto']; //Mensagem do e-mail de confirmação
			$email_colab_log = $_SESSION['login']; //Pega o e-mail do usuário logado
			$registro = $bd->sql_query("Select idcolab from colaboradores where email = '$email_colab_log'; ");
			$result = mysql_fetch_array($registro); //Pega o id do usuário logado
			if($res['sit'] == 0 && $res['Colaboradores_idcolab'] != $result['idcolab']){ //Verifica se a situação do e-mail é 0, ou seja, não lida e se o usuário que abriu a mensagem não é o usuário que enviou
				$bd->sql_query("insert into mensagens values (NULL, $res[iddestino],$res[Colaboradores_idcolab],now(),'Confirma&ccedil;&atilde;o de leitura','$email_report',3);"); //Envia o e-mail de confirmação
				$registro =  $bd->sql_query("update mensagens set sit=1 where idmsg = $res[idmsg]"); //Atualiza a situação do e-mail para 1, ou seja, lida
			}
			else if($res['sit'] == 3){ //Verifica se a situação do e-mail de confirmação é 3, ou seja, não lida
				$registro =  $bd->sql_query("update mensagens set sit=4 where idmsg = $res[idmsg]"); // Atualiza a situação do e-mail de confirmação para 4, ou seja, lida
			}
				
			echo "De: " . $email_remetente['email'] ."<br>" ."Para: " . $email_destino['email']."<br><br><br>"."Mensagem: "."<br><br>". $res['texto']; //Mostra o conteúdo do e-mail na tela		

		?>		
						</h1>

                    </div>
                </div> 
			</div>
            <!-- /. PAGE INNER  -->				
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>



	<body>
		
	</body>
	

</html>