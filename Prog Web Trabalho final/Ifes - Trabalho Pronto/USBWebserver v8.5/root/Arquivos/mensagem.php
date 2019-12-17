<html>
<?php	
	
	include "mensagem_ctr.php";		
	
	// Campos frm
		$idmsg = "";
		$idcolab = "";
		$iddestino="";
		$dtmsg="";
		$assunto="";
		$texto="";
		$sit="";
		
	if (isset($_REQUEST['idmsg'])) {			
		$c = new MensagemCTR();
		$c->buscaId($_REQUEST['idmsg']);
		
		$idmsg = $c->getIdmsg();
		$idcolab = $c->getIdColab();
		$iddestino= $c->getIdDestino();
		$dtmsg= $c->getDtmsg();
		$assunto= $c->getAssunto();
		$texto= $c->getTexto();
		$sit= $c->getSit();	
				
		// quit;
		//$mensagem = $c->getMensagem(); 
		$sub = "gravarAlt"; 	
	} else {
		$sub = "gravar"; 
	}
	  	 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
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
			<form action="../mensagem_ctr.php">
			<?php 
				if (isset($_REQUEST['idcolab'])) echo "<input type='hidden' name='idmsg' value=$idmsg>" ;
			?>
			
		
			ID Colaborador: <br>
			<input type="text" name="idcolab" > <br>
			ID Destino: <br>
			<input type="text" name="iddestino"> <br>			
			Data Mensagem: <br>
			<input type="text" name="dtmsg" > <br>			
			Assunto: <br>
			<input type="text" name="assunto"> <br>
			Texto: <br>
			<input type="text" name="texto"> <br>
			Situação: <br>
			<input type="text" name="sit"> <br>
			
			<input type="submit" value="Enviar"  >  <br>
			<input type="hidden" name="opc">
		</form>	
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




	<body>
		
	</body>
	

</html>