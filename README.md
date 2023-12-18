# README - Projeto Final de Banco de Dados: E-commerce

## Descrição do Projeto

Este projeto consiste no desenvolvimento de um site de e-commerce como parte do projeto final de banco de dados. O sistema inclui funcionalidades essenciais para um ambiente de compras online, tais como cadastro de produtos, compra de produtos, gerenciamento da sacola de compras, finalização da compra, adição de produtos ao carrinho, acompanhamento da compra e login no sistema. Todas essas operações são integradas a um banco de dados MySQL para garantir o armazenamento seguro e eficiente dos dados.

## Tecnologias Utilizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

- **HTML:** Utilizado para a estruturação da página web.
- **CSS:** Responsável pela estilização e layout do site.
- **JavaScript:** Adiciona dinamismo e interatividade à interface do usuário.
- **PHP:** Linguagem de programação server-side utilizada para manipulação de dados e interação com o banco de dados.

## Funcionalidades Principais

1. **Cadastro de Produtos:** Permite adicionar novos produtos ao catálogo do e-commerce, incluindo informações como nome, descrição, preço, etc.

2. **Compra de Produtos:** Possibilita aos usuários selecionar produtos, adicionar ao carrinho e realizar a compra.

3. **Sacola de Compras:** Os usuários podem gerenciar os produtos selecionados, removendo itens ou alterando a quantidade na sacola de compras.

4. **Finalização da Compra:** Após revisar os itens na sacola, os usuários podem finalizar a compra, fornecendo as informações necessárias para a conclusão da transação.

5. **Adição ao Carrinho:** Facilita a adição rápida de produtos ao carrinho durante a navegação pelo site.

6. **Acompanhamento da Compra:** Os usuários podem verificar o status e o histórico de suas compras, acompanhando o processo de envio e entrega.

7. **Login no Sistema:** Garante a segurança e personalização da experiência do usuário, permitindo o acesso a funcionalidades específicas associadas à conta.

## Configuração do Banco de Dados

Certifique-se de configurar corretamente o banco de dados MySQL. O arquivo de configuração `config.php` contém as informações de conexão que podem ser ajustadas conforme necessário.

```php
<?php
$servername = "seu_servidor_mysql";
$username = "seu_usuario_mysql";
$password = "sua_senha_mysql";
$dbname = "seu_banco_de_dados";
?>
