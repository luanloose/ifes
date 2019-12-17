<?php
if(!isset($_SESSION)){
    session_start();
}	
	
	include "conexao.php";
	
	class CursoMOD extends Conexao {			
		
		var $id = "";
		var $destino="";
		var $dtmsg="";
		var $assunto="";
		var $texto="";
			
		
		//Interface - captura de dados 
		function setCurso($idmsg, $destino, $assunto, $texto) {
			$this->id = $idmsg;
			$this->destino = $destino;
			$this->assunto = $assunto;
			$this->texto = $texto;
		}		
		function getId() {
			return $this->id;
		}		
		function getDestino() {			
			return $this->destino;
		}
		function getAssunto() {			
			return $this->assunto;
		}
		function getTexto() {			
			return $this->texto;
		}	
			
		
		// Funções Crud
		function show() { /*Função que mostra os e-mail da caixa de entrada*/
		//	$bd = new Conexao();
			$email_colab_log = $_SESSION['login']; //Pega o e-mail do usuário logado
			$query = $this->sql_query("Select idcolab from colaboradores WHERE email = '$email_colab_log'; ");	
			$id_colab = mysql_fetch_array($query); //Pega o id do usuário logado
			$rg = $this->sql_query("Select *  from mensagens  as m left join colaboradores as c on m.Colaboradores_idcolab = c.idcolab WHERE m.iddestino = $id_colab[idcolab] order by dtmsg DESC; ");	//Pega todos os e-mails recebidos pelo usuário logado
			$c =2;
			$cores = array("#F5F5F5","#FFFFFF");		
			$aux = '<table>
							<tr>
								<td width="200"><div align="center"><b>Remetente</b></div></td>
								<td width="700"><div align="center"><b>Assunto</b></div></td>
								<td width="100"><div align="center"><b>Data</b></div></td>
							</tr>';
	
			while ($res = mysql_fetch_array($rg) ) { //Apresenta na tela em formato de tabela todos os e-mails da caixa de entrada 
				$id = $res["idmsg"];
				$index = $c % 2;
				$c++;
				$cor = $cores[$index];
				$aux =  $aux .'<tr bgcolor = "'.$cor.'">
									<td align="center">'.$res['email'].'</td>
									<td align="center">'.$res['assunto'].'</td>
									<td align="center">'.$res['dtmsg'].'</td>';
									if($res['sit'] == 0){	//Se a situação do e-mail for 0, mostra a imagem da carta como fechada
									$aux =  $aux .	'<td align="center"> <a href="curso_ctr.php?opc=ler&id='.$res['idmsg'].'">
										<img src="img/email_fechado.png" height="20" width="20"></img></a>    
										<a href="curso_ctr.php?opc=excluir&id='.$res['idmsg'].'"> <img src="img/fechar.png" height="20" width="20"></img> </a> <br> </td>';
									}
									else if($res['sit'] == 1){	//Se a situação do e-mail for 1, mostra a imagem da carta como aberta
									$aux =  $aux .	'<td align="center"> <a href="curso_ctr.php?opc=ler&id='.$res['idmsg'].'">
										<img src="img/email_aberto.png" height="20" width="20"></img></a>    
										<a href="curso_ctr.php?opc=excluir&id='.$res['idmsg'].'"> <img src="img/fechar.png" height="20" width="20"></img> </a> <br> </td>';
									}
									else if($res['sit'] == 3){	//Se a situação do e-mail for 3, mostra a imagem da carta como fechada. "e-mail de confirmação"
									$aux =  $aux .	'<td align="center"> <a href="curso_ctr.php?opc=ler&id='.$res['idmsg'].'">
										<img src="img/email_fechado.png" height="20" width="20"></img></a>    
										<a href="curso_ctr.php?opc=excluir&id='.$res['idmsg'].'"> <img src="img/fechar.png" height="20" width="20"></img> </a> <br> </td>';
									}
									else if($res['sit'] == 4){	//Se a situação do e-mail for 4, mostra a imagem da carta como fechada. "e-mail de confirmação"
									$aux =  $aux .	'<td align="center"> <a href="curso_ctr.php?opc=ler&id='.$res['idmsg'].'">
										<img src="img/email_aberto.png" height="20" width="20"></img></a>    
										<a href="curso_ctr.php?opc=excluir&id='.$res['idmsg'].'"> <img src="img/fechar.png" height="20" width="20"></img> </a> <br> </td>';
									}
									
				$aux =  $aux .	'</tr>';	
			}		
			return $aux; 
		}
	
		function novo() {			
			header ("location: novo_email.php");	//Chama a página para envio de um novo e-mail		
		}
		
		function ler($id) {			
			header ("location: mensagem.php?id=$id");	// Chama a página para a leitura do e-mail		
		}
		
		
		// Salva o e-mail no banco
		function gravar () {	
			$destino = $this->getDestino(); //Pega o e-mail da pessoa de destino
			$result = $this->sql_query("Select idcolab from colaboradores where email = '$destino';");
			$id_colab_dest = mysql_fetch_assoc($result); //Pega o id da pessoa de destino
			$assunto = $this->getAssunto(); //Pega o assunto do e-mail
			$texto = $this->getTexto(); //Pega o conteúdo do e-mail
			$email_remetente = $_SESSION['login']; // Pega o usuário que está logado no e-mail
			$result2 = $this->sql_query("Select idcolab from colaboradores where email = '$email_remetente';");
			$id_colab_remet = mysql_fetch_assoc($result2);	//Pega o id do usuário logado	
			$registro =  $this->sql_query("insert into mensagens values (NULL,$id_colab_remet[idcolab],$id_colab_dest[idcolab],now(),'$assunto','$texto',0);"); //Grava o e-mail enviado no banco	
			header("location: caixa_entrada.php"); //Chama a caixa de entrada
		}
		
		// Função não utilizada, pois não preciso alterar e-mail
		function gravarAlt($id) {				
			$id = $this->getId();
			$registro =  $this->sql_query("update cursos set CUR_NOME='$curso' where idcurso = $id");		
			header("location: caixa_entrada.php"); 
		}
		
		//Excluir e-mail no banco
	    function excluir($id) {			
			$id = $this->getId(); //Pega o id da mensagem que será deletada
			$registro =  $this->sql_query("delete from mensagens where idmsg = $id  ");		
			header("location: caixa_entrada.php"); 
		}
		//Função não utilizada
		function buscaId($op) { 
			$rg = $this->sql_query("Select * from mensagens where idmsg = $op;");				
			$res = mysql_fetch_array($rg); 
			$this->setCurso($res["idcurso"],$res["CUR_NOME"]);
		}		
		
	}
	

	
?>
