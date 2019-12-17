<html>


<?php	
	include "mensagem_mod.php";	

?>

<body>
		
	<form action="mensagem_ctr.php">	
		<input type="submit" value="Novo"><br><br>	
		<input type="hidden" value="novo" name="opc"> 			
		<?php 
			$view = new mensagemMOD();	
			
			echo $view->show(); 
			
		?>
	</form>	
	
</body>

</html>