<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inserção de Produtos</title>
    <link rel="stylesheet" type="text/css" href="./css/CriarProdutos.css">
</head>
<body>

<div class="container">
    <h2>Formulário de Inserção de Produtos</h2>

    <!-- Mensagens de Sucesso e Erro -->
   <!-- Mensagens de Sucesso e Erro -->
   <p class="success-message"><?= $_GET['successMessage'] ?? '' ?></p>
    <p class="error-message"><?= $_GET['errorMessage'] ?? '' ?></p>


    <form id="produtoForm" action="../html/ajax/CriarProdutos.php" method="post" onsubmit="return validarForm()">
        <label for="NomeProduto">Nome do Produto:</label>
        <input type="text" id="NomeProduto" name="NomeProduto" required><br><br>

        <label for="precoproduto">Preço do Produto:</label>
        <input type="number" id="precoproduto" name="precoproduto" required><br><br>

        <label for="saldoproduto">Saldo do Produto:</label>
        <input type="number" id="saldoproduto" name="saldoproduto" required><br><br>

        <label for="url_image">URL da Imagem:</label>
        <input type="text" id="url_image" name="url_image"><br><br>

        <input type="submit" value="Inserir Produto">
    </form>
    
    <div class="container mt-5">
			<button id="btnCriarProduto" class="btn btn-purple">Voltar para produtos</button>
		</div>
		  <script>
			document.getElementById('btnCriarProduto').addEventListener('click', function() {
			  window.location.href = './produtos.html';
			});
		  </script>
</div>

<script src="./js/CriarProduto.js"></script>

</body>
</html>
