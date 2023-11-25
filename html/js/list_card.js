var total_count = 0;
window.addEventListener("load", function () {
  getProductsCard().then((card_itens) => {
    initiateProductsList(card_itens);
    initiatePaymentMethods();

    $(".btn-add").click(function () {
      var captura_id = $(this).attr("id");
      let array = converted_array(localStorage.getItem("items"));

      array.push(captura_id);
      localStorage.setItem("items", JSON.stringify(array));
      $.toast({
        heading: "Item Adicionado",
        text: `Seu item foi ${
          products[captura_id - 1].nome.split(", ")[0]
        } adicionado no carrinho`,
        position: "top-right",
        stack: false,
        bgColor: "#9400D3",
        hideAfter: 1000,
        textColor: "white",
      });

      setTimeout(() => {
        window.location.href =
          "http://localhost/Projeto-Banco-de-Dados/html/sacola.html";
      }, 1500);
    });

    $(".btn-remove").click(function () {
      let productId = $(this).attr("id");
      let itemsId = converted_array(localStorage.getItem("items"));
      console.log(productId);
      let productToBeRemoved = itemsId.findIndex((item) => item == productId);

      if (productToBeRemoved !== -1) {
        itemsId.splice(productToBeRemoved, 1);
        console.log(products[productToBeRemoved]);
        $.toast({
          heading: `Item removido - ${
            products[productToBeRemoved].nome.split(", ")[0]
          }`,
          text: "Seu item foi removido no carrinho",
          position: "top-right",
          stack: false,
          icon: "warning",
          bgColor: "#f76420",
          textColor: "white",
          hideAfter: 1000,
        });
      }

      localStorage.setItem("items", JSON.stringify(itemsId));
      setTimeout(() => {
        window.location.href =
          "http://localhost/Projeto-Banco-de-Dados/html/sacola.html";
      }, 1500);
    });

    $("#completeCard").click(function () {
      console.log("ola");
      $("#main_card_div").append(`
      <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
      `);
    });
  });
});

function initiateProductsList(card_list) {
  var class_main_div = $(".produtosTabela");
  let items_card = card_list;
  let items_card_local = converted_array(localStorage.getItem("items"));
  let uniques = Array.from(new Set(items_card_local.map(String)));

  class_main_div.empty();

  if (uniques.length == 0)
    class_main_div.append(`
  <h5 class="title_card" style="font-size: 27px; margin: 50px;font-weight: 300;color: #ccc;">
    Não ha nada no carrinho :(
  </h5>`);

  items_card.map((product) => {
    const count = items_card_local.filter(
      (item) => Number(item) === product.idProdutos
    ).length;
    console.log(`Product ID: ${product.idProdutos}, Count: ${count}`);
    current_price = count * product.precoproduto;
    total_count += current_price;
    class_main_div.append(`
    <div class="product">
    <div class="details">
      <div class="img_prod"><img src="${product.url_image}" /></div>
      <div class="name_prod">
        <p>
        ${product.NomeProduto} <br />
          <strong
            style="
              color: #ccc;
              font-weight: 300;
              font-size: 15px;
              margin: none !important;
            "
            >Mecanico portail para usos</strong>
        </p>
      </div>
      <div class="add_products_controls">
        <button class="btn-add" id="${product.idProdutos}"> + </button>
        <strong> ${count} </strong>
        <button class="btn-remove" id="${product.idProdutos}"> - </button>
      </div>
    </div>
  </div>
      `);
  });

  $("#totalCompra").append(`
    R$ ${total_count}
  `);
}

function converted_array(json_string) {
  array = JSON.parse(json_string);
  let arr = [];

  for (let i in array) arr.push(array[i]);

  return arr;
}

function initiatePaymentMethods() {
  payment_methods_json.forEach((value) => {
    $(".payment_details").append(`
    <div class='box' onclick='setPagmentSelected("pag_${value.id}")' id='pag_${value.id}'>
    <img
      src='${value.image}'
    />
  </div>
    `);
  });
}

function setPagmentSelected(payment_type) {
  paymnet_list_form = $(".payment_form");

  if (resetMethods()) return;

  $(`#${payment_type}`).addClass("selected_box");

  paymnet_list_form.empty();

  animateListsPay(payment_type);

  if (Number(payment_type.split("pag_")[1]) == 5) return;
  paymnet_list_form.append(`
    <p style="font-size: 18px">Numero do Cartão</p>
                <input type="number" />
                <p style="font-size: 18px">Nome do Cartão</p>
                <input type="text" />
                <div class="splited_inputs">
                  <div>
                    <p style="font-size: 18px">CVV</p>
                    <input type="number" />
                  </div>
                  <div>
                    <p style="font-size: 18px">DATA DE VENCIMENTO</p>
                    <input type="text" />
                  </div>
                </div>
    `);
}

function animateListsPay(payment_type) {
  payment_methods_json.forEach((value) => {
    if ("pag_" + value.id != payment_type) {
      $(`#pag_${value.id}`).fadeOut();
    }
  });
}

function resetMethods() {
  console.log($(".selected_box"));
  if ($(".selected_box").length >= 1) {
    $(".payment_details").empty();
    $(".payment_form").empty();
    initiatePaymentMethods();
    return true;
  }
}

async function getProductsCard() {
  var itens = JSON.parse(localStorage.getItem("items")).map((str) =>
    parseInt(str, 10)
  );

  try {
    const response = await fetch(
      "http://localhost/Projeto-Banco-de-Dados/html/ajax/produto.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          method: "get_product",
          ids: itens,
        }),
      }
    );

    const result = await response.json();

    return result;
  } catch (error) {
    throw error;
  }
}

function aguardarRedirecionamento() {
  document.querySelector(".btn-transition").classList.add("fade-out");

  let default_params = {
    method: "add_order",
    ids: JSON.parse(localStorage.getItem("items")),
    total: total_count,
  };

  $.ajax({
    url: "http://localhost/Projeto-Banco-de-Dados/html/ajax/pedido.php",
    contentType: "application/json",
    method: "post",
    data: JSON.stringify(default_params),
  });

  setTimeout(function () {
    window.location.href = "../html/acompanhaACompra.html";
    localStorage.removeItem("items");
  }, 100);
}
