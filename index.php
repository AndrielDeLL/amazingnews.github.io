<?php

	SESSION_START();
	
	$con = mysql_connect("localhost", "root", "");
	mysql_select_db("AmazingNews", $con);
	mysql_query("SET NAMES utf8");
	

?>

<html>
	<head>
		<title>Amazing News</title>
		<link rel="stylesheet" href="css/inicio.css" />
		<link rel="shortcut icon" href="Imagens/icone.png" />
	</head>
</html>
	<body class="body">
		<div id="topo">
			
		</div>
		<div id="geral">
		
			<div id="logo">
				
			</div>
			
			<div id="usuario">
				<?php	if( isset($_SESSION['login']) AND $_SESSION['login'] == true ){?>
				
						<div id="canto_user">
							<div id="contorno1">
							</div>
						</div>
					
						<div id="dados_usuario"> <?php
					
						$id_usuario = $_SESSION['id_usuario'];
							
						
						$sql = "SELECT
									nome,
									foto
								FROM
									usuarios
								WHERE
									id_usuario = $id_usuario";
						
						$res = mysql_query($sql, $con);
						
						while( $linha = mysql_fetch_array($res) ){
						
							echo "<img src='{$linha['foto']}' width='60' height='60'>";
							echo "<div id='nome_usuario'>";
							echo $linha['nome'];
							echo "</div>";
							echo "<br />";
							
						?> <div id="opcoes_usuario"> <?php
							
							echo "<a href='index.php?pagina=editar_conta'>Editar</a>";
							echo "<a href='logout.php'> Sair</a>";
							
							if ($_SESSION['adm'] == "0"){
							
								echo "<br />";
								echo "<a href='admin/index.php'>Administrador</a>";
							
							}
							
						?> </div> <?php
						
						}
							
						?> </div>
						
						<div id="canto_user">
							<div id="contorno2">
							
							</div>
						</div>

						<?php } ?>
			</div>
			
			<div id="menu">
				<ul>
					<li><a href="index.php?pagina=inicio" id="barra_menu">Início</a></li>
					<li><a href="index.php?pagina=listar_noticias_1" id="barra_menu">Notícias</a></li>
					<li><a href="index.php?pagina=contato" id="barra_menu">Contato</a></li>
					<li><a href="index.php?pagina=cadastro" id="barra_menu">Cadastre-se</a></li>
					<li><a href="index.php?pagina=login">Login</a></li>
				</ul>
			</div>
			
			<div id="conteudo">
				<?php
					
					if( isset($_GET['pagina']) ){
						$pagina = $_GET['pagina'];
					} else {
						$pagina = "inicio";
					}
					
					/*
					if( $pagina == "inicio" ){
						include "inicio.php";
					} elseif( $pagina == "cadastro" ){
						include "cadastro.php";
					} elseif( $pagina == "cadastro_bd" ){
						include "cadastro_bd.php";
					} elseif( $pagina == "login" ){
						include "login.php";
					} elseif( $pagina == "login_bd" ){
						include "login_bd.php"
					} elseif( $pagina == "cadastro_concluido" ){
						include "cadastro_concluido.php"
					}*/
					
					include "$pagina.php";
					
					?>
			</div>
			
			<div id="lateral">
				lateral
			</div>
			
		</div>
	</body>