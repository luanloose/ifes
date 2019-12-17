<?
	session_start();
?>        
		
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="INICIAL.php">IFES</a>
            </div>

			<div class="header-right">
				<a href="doLogout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"> SAIR</i></a>
			</div>
           
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <!--<img src="assets/img/user.png" class="img-thumbnail" /> -->
                            <div class="inner-text">
                                <?php 
								if($_SESSION['login'] != "")
								{
									echo "Logado como: ". $_SESSION['login']; //Mostra o usuário logado
								}   
								
								?>
                            <br>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="novo_email.php"><i class="fa fa-dashboard "></i>NOVO</a>
                    </li>
                    <li>
                        <a href="caixa_entrada.php"><i class="fa fa-desktop "></i>CAIXA DE ENTRADA<span class="fa arrow"></span></a>
                    </li>
                     <li>
                        <a href="mensagens_enviadas.php"><i class="fa fa-yelp "></i>ENVIADOS<span class="fa arrow"></span></a>
                  
                    </li>
                     <!--<li>
                        <a href="#"><i class="fa fa-bicycle "></i>MODULO <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="ESTOQUE.php"><i class="fa fa-plus "></i>GERENCIAR </a>
                            </li>
                             
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>CONTAS <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                <a href="SERVICOS.php"><i class="fa fa-plus "></i>GERENCIAR </a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="blank.html"><i class="fa fa-square-o "></i>Blank Page</a>
                    </li>
                </ul> -->

            </div>

        </nav>
        <!-- /. NAV SIDE  -->