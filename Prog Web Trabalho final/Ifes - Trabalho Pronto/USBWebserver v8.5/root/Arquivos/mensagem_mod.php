<?php

	include "conexao.php";
	
	class MensagemMOD extends Conexao {			
		
		var $idmsg = "";
		var $idcolab = "";
		var $iddestino="";
		var $dtmsg="";
		var $assunto="";
		var $texto="";
		var $sit="";
		
		
		//Interface - captura de dados 
		function setMensagem($idcolab,$iddestino,$dtmsg,$assunto,$sit) {
			$this->idmsg = $idmsg;
			$this->idcolab = $idcolab;	
			$this->iddestino = $iddestino;
			$this->dtmsg = $dtmsg;
			$this->assunto = $assunto;
			$this->texto = $texto;
			$this->sit = $sit;
			

		}		

		// Gets
		function getIdMsg() {return $this->idmsg;}
		function getIdColab() {return $this->idcolab;}		
		function getIdDestino() {return $this->iddestino;}				
		function getDtmsg() {return $this->dtmsg;}	
		function getAssunto() {return $this->assunto;}	
		function getTexto() {return $this->texto;}
		function getSit() {return $this->sit;}
		

		// Funções Crud
		function show() {
		//	$bd = new Conexao();	
			$rge = $this->sql_query("Select * from mensagens order by idmsg; ");				
			$aux = "";
			
			// echo 'Nome - '
			while ($res = mysql_fetch_array($rge) ) {
				$id = $res["idcolab"];
				$aux = $aux .$res['idmsg']." - ".$res['idcolab']." - ".$res['iddestino']." - ".$res['dtmsg']." - ".$res['assunto']." - ".$res['texto']." - ".$res['sit'];
			}		
			return $aux; 
		}	
		function novo() {			
			header ("location: mensagem.php");			
		}
		
		function alterar($id) {
			$id = $this->getIdColab();
			header ("location: mensagem.php?idmsg=$id");			
		}
		
		
		// Salva no banco
		function gravar () {	
			$idcolab = $this->getIdColab();
			$iddestino= $this->getIdDestino();
			$dtmsg= $this->getDtmsg();
			$assunto= $this->getAssunto();
			$texto= $this->getTexto();
			$sit= $this->getSit();		
			
			
			$registro =  $this->sql_query("insert into mensagens () values (NULL, $idcolab, $iddestino, '$dtmsg', '$assunto', '$texto', '$sit'); ");		
			header("location: mensagem_vie.php"); 
		}
		
		// Altera no banco
		function gravarAlt($idcolab) {				
			$idmsg = $this->getIdMsg();
			$idcolab = $this->getIdColab();
			$iddestino= $this->getIdDestino();
			$dtmsg= $this->getDtmsg();
			$assunto= $this->getAssunto();
			$texto= $this->getTexto();
			$sit= $this->getSit();	
			$registro =  $this->sql_query("update  mensagens set  colaboradores_idcolab=$idcolab, iddestino=$iddestino, dtmsg='$dtmsg', assunto='$assunto', texto='$texto', sit='$sit'); ");		
			header("location: mensagem_vie.php"); 
		}
		
		//Excluir no banco
	    function excluir($id) {			
			$id = $this->getIdmsg();
			$registro =  $this->sql_query("delete  from mensagens where idmsg = $id  ");		
			header("location: mensagem_vie.php"); 
		}

		function buscaId($op) { 
			$rge = $this->sql_query("Select * from mensagens where idmsg = $op;");				
			$res = mysql_fetch_array($rge); 
			// ($idmsg, $idcolab, $iddestino, '$dtmsg', '$assunto', '$texto', '$sit')
			$this->setColaboradores($res["idmsg"],$res["colaboradores_idcolab"],$res["iddestino"],$res["dtmsg"],$res["assunto"],$res["texto"],$res["sit"]);
		}		
		
	}
	

	
?>