<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
	
	include "mensagem_mod.php";

	class MensagemCTR extends MensagemMOD {				
		
		function shows() {			
			$cm = new MensagemMOD();
			return $cm->show();
		} 
		
		function opcaoCTR($op) {
			
			echo " resultado: $op ";

			//opção selecionado pelo usuário 	
			switch ($op) {		
				case "filtro": 
					break;
				case "novo":
					$this->novo(); 
					break;
				case "gravar":
					$this->gravar();
					break;
				case "alterar":		
					$this->alterar($this->getIdMsg());			
					break;
				case "gravarAlt":		
					$this->gravarAlt($this->getIdMsg());				
					break;
				case "excluir":					
					$this->excluir($this->getIdMsg());
					break;
			}		
		}
	}
	
	
	
	
	// Model 
	$cm = new MensagemCTR();	
	
	// Recebendo opção selecionada 		
	if (isset($_REQUEST['opc'])) {
		
		// Recebe dados do form
		if ( isset($_REQUEST['idcolab']) || isset($_REQUEST['dtmsg']) || isset($_REQUEST['assunto']) || isset($_REQUEST['texto']) 
			|| isset($_REQUEST['sit'])) 
			 {				
			
			
					
			if (isset($_REQUEST['idcolab'])) $idacesso = $_REQUEST['idcolab'];
			if (isset($_REQUEST['iddestino'])) $idconta = $_REQUEST['iddestino'];
			if (isset($_REQUEST['dtmsg'])) $idrua = $_REQUEST['dtmsg'];
			if (isset($_REQUEST['assunto'])) $nome = $_REQUEST['assunto'];
			if (isset($_REQUEST['texto'])) $cep = $_REQUEST['texto'];
			if (isset($_REQUEST['sit'])) $cep = $_REQUEST['sit'];
			
			// Armazena dados na classe
			$cm->setMensagem($idcolab, $iddestino, $dtmsg, $assunto, $texto, $sit); 			
		
		}
		
		// Recebe opção  
		$opc = $_REQUEST['opc'];
		$cm->opcaoCTR($opc); 		

	}	
		
				

?>