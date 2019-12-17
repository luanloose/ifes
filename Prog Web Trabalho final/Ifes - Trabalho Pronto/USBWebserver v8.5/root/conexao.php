<?php

class Conexao {
	// Coloque aqui as Informações do Banco de Dados
	var $host = "localhost";
	var $user = "root"; # Usuário no Host/Servidor
	var $senha = "usbw"; # Senha no Host/Servidor
	var $dbase = "bolsistas"; # Nome do seu Banco de Dados

	// Cria as variáveis que Utilizaremos
	var $query;
	var $link;
	var $resultado;
    
	function MySQL(){
	// Instancia o Objeto para usarmos
	}

	function Conexao() {		
		$this->conecta();			
	}	
	
	// Cria a função para Conectar ao Banco MySQL
	function conecta() {
		$this->link = @mysql_connect($this->host,$this->user,$this->senha);
		// Conecta ao Banco de Dados
		if(!$this->link){
		    // Caso ocorra um erro, exibe uma mensagem com o erro
		    print "Ocorreu um Erro na conexão MySQL:";
		    print "<b>".mysql_error()."</b>";
		    die();
		}elseif(!mysql_select_db($this->dbase,$this->link)){
		    // Seleciona o banco após a conexão
		    // Caso ocorra um erro, exibe uma mensagem com o erro
		    print "Ocorreu um Erro em selecionar o Banco:";
		    print "<b>".mysql_error()."</b>";
		    die();
		}
	}
	

	// Cria a função para query no Banco de Dados
	function sql_query($query){
		$this->conecta();
		$this->query = $query;
		
		// Conecta e faz a query no MySQL
		if($this->resultado = mysql_query($this->query)){
		    $this->desconnecta();
		    return $this->resultado;
			
		}else{
		    // Caso ocorra um erro, exibe uma mensagem com o Erro
		    print "Ocorreu um erro ao executar a Query MySQL: <b>$query</b>";
		    print "<br /><br />";
		    print "Erro no MySQL: <b>".mysql_error()."</b>";
		    die();
		    $this->desconnecta();
		}        
	}

	// Retorna o registro da tabela especificada
	function verReg($tabela, $id) {		
		$this->conecta();
		global $consulta;
		
		$query = "select * from " . $mensagem;
		if ($id!="") {
		    $query = $query . " where " . $idmsg;				
		}	

		$consulta = mysql_query($query);
		$this->resultado = mysql_fetch_array($consulta);		

		return $this->resultado;				
		$this->desconnecta(); 
	}

	// Retorna data formatada
	function parseDate($date, $outputFormat = 'd/m/Y') {
	    $formats = array(
		'd/m/Y',
		'd/m/Y H',
		'd/m/Y H:i',
		'd/m/Y H:i:s',
		'Y-m-d',
		'Y-m-d H',
		'Y-m-d H:i',
		'Y-m-d H:i:s',
	    );
	    foreach($formats as $format){
		$dateObj = DateTime::createFromFormat($format, $date);
		if($dateObj !== false){
		    break;
		}
	    }
	    if($dateObj === false){
		throw new Exception('Data inválida!' . $date);
	    }
	    return $dateObj->format($outputFormat);
	}


	// Cria a função para Desconectar ao Banco MySQL
	function desconnecta(){
		return mysql_close($this->link);
	}
	
	
	// Formatação de data 
	// data=dd/mm/aaaa; 
	// datahora=dd/mm/aaaa hh:mm:ss; 
	// hora=hh:mm:ss	
	
	function data($dt, $outFmt = 'd/m/Y') {		
		
		if ($outFmt!= 'd/m/Y') {
			switch  ($outFmt) {
				case "data":
					$outFmt = 'd/m/Y';
					break;
				case "datahora":
					$outFmt = 'd/m/Y H:i:s';
					break;
				case "hora":
					$outFmt = 'd/m/Y H:i:s';
					break;
					
			}
		}		

		return  date($outFmt, strtotime($dt));
	}
}

?>