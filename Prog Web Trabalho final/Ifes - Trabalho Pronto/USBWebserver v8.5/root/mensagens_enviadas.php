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
                        <h1 class="page-head-line">BOLSISTAS - Emails Enviados</h1>
							
		
                        <h1 class="page-subhead-line">
						
						<?php
			$bd = new Conexao();
			$email_colab_log = $_SESSION['login']; //Pega o e-mail do usuário logado
			$query = $bd->sql_query("Select idcolab from colaboradores WHERE email = '$email_colab_log';"); 	
			$id_colab = mysql_fetch_array($query); //Pega o id do usuário logado
			$rg = $bd->sql_query("Select m.idmsg, c.email, m.assunto, m.texto, m.dtmsg  from mensagens  as m left join colaboradores as c on m.Colaboradores_idcolab = c.idcolab WHERE m.Colaboradores_idcolab = $id_colab[idcolab] order by dtmsg DESC; "); //Consulta todos os e-mails enviados pelo o usuário logado
			$c =2;
			$cores = array("#F5F5F5","#FFFFFF");		
			echo '<table>
							<tr>
								<td width="200"><div align="center"><b>Remetente</b></div></td>
								<td width="700"><div align="center"><b>Assunto</b></div></td>
								<td width="100"><div align="center"><b>Data</b></div></td>
							</tr>';
	
			while ($res = mysql_fetch_assoc($rg) ) { //Apresenta na tela todos os e-mails enviados pelo usuário logado
				$id = $res["idmsg"];
				$index = $c % 2;
				$c++;
				$cor = $cores[$index];
				echo '<tr bgcolor = "'.$cor.'">
									<td align="center">'.$res['email'].'</td>
									<td align="center">'.$res['assunto'].'</td>
									<td align="center">'.$res['dtmsg'].'</td>
									<td align="center"> <a href="curso_ctr.php?opc=ler&id='.$res['idmsg'].'"><img src="img/email_fechado.png" height="20" width="20"></img></a>    <a href="curso_ctr.php?opc=excluir&id='.$res['idmsg'].'"> <img src="img/fechar.png" height="20" width="20"></img> </a> <br> </td>
								</tr>';	
			}		

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

    <div id="footer-sec">
       
    </div>
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