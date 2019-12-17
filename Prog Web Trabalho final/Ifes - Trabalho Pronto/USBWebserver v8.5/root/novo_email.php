<html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">



<?php
	session_start();
	if($_SESSION['login']== ""){
	header ("location: login_email.php");	
}	
	include "curso_ctr.php";		
	
	// Campos frm
	$id = "";
	$curso = "";
	$destino = "";
	$assunto = "";
	$texto = "";	
		
	if (isset($_REQUEST['id'])) {			
		$c = new CursoCTR();
		$c->buscaId($_REQUEST['id']);	
		$id = $c->getId();
		$curso = $c->getCurso(); 
		$sub = "gravarAlt"; 	
	} else {
		$sub = "gravar"; 
	}
	  	 
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
                        <h1 class="page-head-line">BOLSISTAS - Novo Email</h1>
						 <div id="footer-sec"></div>
							
							<form action="curso_ctr.php">
			<?php 
				if (isset($_REQUEST['id'])) echo "<input type='hidden' name='id' value=$id>" ;
			?>
						<!--Formulário para a criação de um novo e-mail -->
			Para: <br>
					<input type="text" name="destino" id="destino" size="50"> <br>					
			Assunto: <br>
					<input type="text" name="assunto" id="assunto" size="50"> <br>
			Texto: <br>
					<textarea rows="4" cols="50" name="texto" id="texto"></textarea> <br>
			
			<input type="submit" value="Enviar"  >  <br>
			<input type="hidden" name="opc" value="gravar">
		</form>	
                        <h1 class="page-subhead-line">
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
        &copy; 2015 DROGS S.A | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
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