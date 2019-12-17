<!DOCTYPE html>
<?php	
	include "cursos_mod.php";	

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
                        <h1 class="page-head-line">SISTEMA GERENCIAMENTO DE COLABORADORES</h1>
                        <h1 class="page-subhead-line">
										<form action="cursos_ctr.php">	
					<input id="btnovo" type="submit" value="Novo"> 			
					<input type="hidden" value="novo" name="opc"> 			
					<?php 
						$view = new CursoMOD();	
						
						echo "
						<table> 
							<tr>
								<th>Curso</th>
								<th>Carga Horária</th>
								<th></th>
								<th></th>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						";
						echo "<br><br>".$view->show(); 
						echo"</table>";
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
