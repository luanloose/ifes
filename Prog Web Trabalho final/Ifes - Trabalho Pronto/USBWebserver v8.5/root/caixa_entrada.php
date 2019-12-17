<html>
<?php
session_start();

if($_SESSION['login']== ""){
	header ("location: login_email.php");	
}
	
	include "curso_mod.php";	

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
                        <h1 class="page-head-line">BOLSISTAS - Caixa de Entrada</h1>
                        <h1 class="page-subhead-line">
								<form action="curso_ctr.php">	
								<!--	<input type="submit" value="Novo"> 			-->
									<input type="hidden" value="novo" name="opc"> 			
		<?php 
			$view = new CursoMOD();	
			
			echo $view->show(); //Mostra os e-mail da caixa de entrada
			
		?>
		
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