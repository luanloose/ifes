<?php	
	include "curso_mod.php";

	class CursoCTR extends CursoMOD {				
		
		function shows() {			
			$cm = new CursoMOD();
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
				case "ler":		
					$this->ler($this->getId());			
					break;
				case "gravarAlt":		
					$this->gravarAlt($this->getId());				
					break;
				case "excluir":					
					$this->excluir($this->getId());
					break;
			}		
		}
	}
	
	
	// Model 
	$cm = new CursoCTR();	
	
	// Recebendo opção selecionada 		
	if (isset($_REQUEST['opc'])) {
		
		// Recebe dados do formulário
		if (isset($_REQUEST['id']) || isset($_REQUEST['destino']) || isset($_REQUEST['assunto']) || isset($_REQUEST['texto'])) {				
			$id="";
			$destino="";
			$assunto="";
			$texto="";
			if (isset($_REQUEST['id']))	$id = $_REQUEST['id'];		
			if (isset($_REQUEST['destino'])) $destino = $_REQUEST['destino'];
			if (isset($_REQUEST['assunto'])) $assunto = $_REQUEST['assunto'];
			if (isset($_REQUEST['texto'])) $texto = $_REQUEST['texto'];
			
			// Armazena dados na classe
			$cm->setCurso($id, $destino, $assunto, $texto); 			
		
		}
		
		// Recebe opção  
		$opc = $_REQUEST['opc'];
		$cm->opcaoCTR($opc); 		

	}	
		
				

?>