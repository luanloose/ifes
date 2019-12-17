
<html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">



<?php	
	session_start();
	include "curso_ctr.php";
	
		
	  	 
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Autentica&ccedil;&atilde;o no E-mail - Bolsistas</title>
	 <link rel="stylesheet" href="css/estilo.css" type="text/css" media="all" />
    	 <link rel="shortcut icon" href="images/favicon.png"/>

<style>
*{
	margin: 0 auto; /*centraliza o conteudo da pagina*/
}



label{
	display: block; /*Faz com que os campos do formulario sejam exibidos na vertical sem a necessidade do velho <br>*/
}

/*centraliza a tela de login no meio da tela*/
#ajustar_tela{
	background-color: #ffffff;
	border:1px solid #D9D9D9;
	position: relative;
	width: 300px; /*largura da div login*/
	text-align: center; /*centraliza elementos do form*/
	padding: 30px; /*definimos tamanho do espaçamento interno*/
	margin-top: 10%; /*centralizamos verticalmente o form na tela*/
	border-radius:6px;
	-webkit-border-radius: 6px;
	-moz-border radius: 6px;
}
</style>


<?php
	include "head.php";
?>
<body>
    <div id="wrapper">
		<?php
			
		?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">BOLSISTAS</h1>
							
		
                        <h1 class="page-subhead-line">
						
					
					
<div id="ajustar_tela">
<!-- Formulário para autenticação no e-mail -->
<form action="autenticacao_email.php" method="post" name="formAD">
<label><b>E-mail</b></label>
<input name="username" type="text" size="20" maxlength="30" autofocus /><br><br>
<label><b>Senha</b></label>
<input name="password" type="password" size="20" maxlength="30" /><br><br>
<input name="Acessar" Value="Acessar" type="submit" class="css_btn_class"/>

</form>

</div>
					
					
					
					
					
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



	<body>
		
	</body>
	

</html>



</head>
<body>
 
</body>
</html>
