<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>::.. Produtos ..::</title>

	<link href="./css/reset.css" rel="stylesheet">
	<link rel="stylesheet" href="../html/css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="./imagens/icon/Treetog-Junior-Earth.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
</head>

<body>
	<img src="./imagens/icon/up_arrow.png" alt="Voltar ao topo" id="voltar_ao_topo">
	<nav class="nav">
		<ul class="dropdown">
			<img src="../html/assets/logo.png" class="logo_nav_bar"></img>
			<li><a href="./menu.html">Menu</a></li>
			<li><a href="./produtos.php">Produtos</a></li>
			<li><a href="./sobre.html">Sobre Nós</a></li>
			<?php 
				if(!isset($_SESSION['logado'])){
					echo '<li><a href="./login_page.php">Login</a></li>';
				}
			?>
			<section class="cart_container">
				<li></li>
			</section>
		</ul>
		<img src="./imagens/icon/menu.png" alt="menu">
	</nav>
	<section class="banner"></section>

	<div class="titulo-prod">
		<h1 style="color: #000">Produtos</h1>
		<?php
		if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
			echo '<div class="container mt-5" style="padding: 20px;">
				<button id="btnCriarProduto" 
				style="
				background-color: blueviolet;
				color: white;
				padding: 10px;
				border: none;
				outline: none;
				border-radius: 15px;
				">Criar Produto</button>';
		}
	?>
	</div>
	<script>
		document.getElementById('btnCriarProduto').addEventListener('click', function () {
			window.location.href = './index.php';
		});
	</script>
	</div>
	<br />
	<br />
	<br />
	<div class="prod"></div>
	<form class="form-horizontal" action="./api.php" method="post" />
	<fieldset>

		<br>

		<!-- Text input-->
		<center>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">
					<h2>Calcular o frete </h2>
				</label>
				<div class="col-md-4">
					<input id="textinput" name="cep" type="number" placeholder="Informe o CEP" class="field"
						required="">

				</div>
			</div>
			<div>
				<!--ENDERECO-->
			</div>

			<!-- Button -->
			<div class="form-group">
				<div class="col-md-2">

					<br><button id="bPesquisar" name="bPesquisar" class="btn-comprar" type="submit">Consultar</button>
				</div>
			</div>

		</center>

	</fieldset>
	</form>
	</div>

	<div class="footer">
		<div class="inner-footer">

			<div class="footer-items">
				<h2>Eletrônicos shop hoje</h2>
				<br>
				<p>
					Os desktops estão sofrendo uma transformação e

					se tornando em verdadeiras máquinas para entretenimento

					no qual chamamos de PC Gamer! Hoje, o mercado que mais cresce

					é o de computador gamer voltado para jogos e entusiastas.
					<br>
					A Eletrônicos shop já sabendo dessa tendência vem oferecendo configurações

					muito bem escolhidas e equilibradas que cabem no bolso do consumidor brasileiro.
				</p>
			</div>

			<div class="footer-items">
				<h2>Atalhos rápidos</h2>
				<div class="border"></div>
				<ul>
					<a href="./menu.html">
						<li>Home</li>
					</a>
					<a href="./produtos.php">
						<li>Produtos</li>
					</a>
					<a href="./sobre.html">
						<li>Sobre nós</li>
					</a>
				</ul>
			</div>

			<div class="footer-items">
				<h2>Entre em contato conosco</h2>
				<div class="border"></div>
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>Rod. Sen. Teotônio Vilela 3821, Araçatuba
					</li>
					<br>
					<li><i class="fa fa-phone" aria-hidden="true"></i>(18) 9 9900-0000</li>
					<br>
					<li><i class="fa fa-envelope" aria-hidden="true"></i>support@Eletrônicos.com</li>
				</ul>
				<div class="social-media">
					<a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="https://www.twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a href="https://www.gmail.com/"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
				</div>
			</div>

		</div>
		<center>
			<div class="footer-bottom">
				Copyright &copy; Erik e Adamilton 2022. Todos os direitos reservados.
			</div>
		</center>
	</div>
</body>
<script src="./js/produtos.js"></script>
<script src="./js/geral.js"></script>
<script src="./js/product/products_obj.js"></script>

</html>