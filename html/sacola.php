<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../html/imagens/icon/Treetog-Junior-Earth.ico" type="image/x-icon">
  <title>::.. Carrinho de Compras ..::</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet" />
  <link href="./css/sacola.css" rel="stylesheet" />
  <script src="./js/product/products_obj.js"></script>
  <script src="./js/methods_pay/payment_methods.js"></script>
  <script src="./js/produtos.js"></script>
  <script src="./js/list_card.js"></script>
</head>

<body>
  <div class="container-fluid" id="main_card_div">
    <div class="handlers_and_infos" style="font-size: 23px; margin: 50px">
      <h1 class="title_card">
        Carrinho de Compras
      </h1>
      <h5 class="title_card">
        Seus itens do carrinho sera armazenados aqui
      </h5>

      <button type="button" class="btn btn-dark btn-transition" onclick="redirecionarParaCompras()"
        style="background: #5458b3;color: white;">Volte para as
        compras</button>
    </div>

    <script>
      function redirecionarParaCompras() {
        // Aguarde 2 segundos (2000 milissegundos) antes de redirecionar
        setTimeout(function () {
          // Tornar o botão transparente durante a transição
          document.querySelector('.btn-transition').style.opacity = 0;

          // Aguarde mais 0.5 segundos antes de redirecionar
          setTimeout(function () {
            window.location.href = '../html/produtos.php';
          });
        });
      }
    </script>

    <div class="row">
      <div class="col-md-9">
        <div class="produtosTabela">

        </div>
        <tfoot>
          <tr></tr>
        </tfoot>
      </div>
      <!-- Lado Direito -->
      <div class="col-md-3">
        <div
          style="padding: 10px; background-color: #5458b3; color: white; font-size: 23px; border-radius: 20px; position: relative; margin-left: -10px; width: 100%; overflow-x: hidden;">
          <p>Metodos de Pagamentos</p>
          <div class="list_payment_methods">
            <p>Detalhes do cartão</p>
            <div class="payment_details" style="display: flex;"></div>
            <div class="payment_form"></div>
          </div>
          <hr />
          <div>
            <td align="right" colspan="3">
              <strong>Total da Compra:
                <p id="totalCompra"></p>
              </strong>
            </td>
            <style>
              .btn-transition {
                transition: opacity 0.5s ease-in-out;
              }

              .fade-out {
                opacity: 0.8;
              }

              @keyframes fadeIn {
                from {
                  opacity: 0;
                }

                to {
                  opacity: 1;
                }
              }
            </style>
            <?php
            if (isset($_SESSION['is_admin'])) {
              echo '<button type="button" class="btn btn-dark btn-transition" style="padding: 20px; width: 100%;" onclick="aguardarRedirecionamento()">
                Finalizar Compra
              </button>';
            } else {
              echo '<button type="button" class="btn btn-dark btn-transition" style="padding: 20px; width: 100%;" onclick="loginAlert()">
                Finalizar Compra
              </button>';
            }
            ?>

            <script>
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>