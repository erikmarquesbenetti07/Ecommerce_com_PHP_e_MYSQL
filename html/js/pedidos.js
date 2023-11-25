$(function () {
  getOrders().then((orders) => {
    listItems(orders);
    //openDetails();
  });
});

async function getOrders() {
  try {
    const response = await fetch(
      "http://localhost/Projeto-Banco-de-Dados/html/ajax/pedido.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          method: "get_orders",
        }),
      }
    );

    const result = await response.json();

    return result;
  } catch (error) {
    throw error;
  }
}

function listItems(orders) {
  var list = $(".list_items");

  orders.map((order) => {
    list.append(`<div
    class="item"
    onclick='openDetails(${order.idPedido})'
  >
    <p>Total Pedido: R$ ${order.ValorPedido}</p>
    <p>Dia: ${order.DataPedido}</p>
  </div><br/>`);
  });
}

function openDetails(id_order) {
  let main_tab = $(".main_tab");
  let items = [];

  $.ajax({
    url:"http://localhost/Projeto-Banco-de-Dados/html/ajax/pedido.php",
    type: 'POST',
    contentType: "application/json; charset=utf-8",
    data: JSON.stringify({
        method: "get_order_product",
        id_order: id_order
      }),
  })

  main_tab.append(`
    <div class="item_details">
        <div class="item_list_details" style="width:400px;margin:auto;">
            ${items.map((item) => {
              return `<div class="item">
                <img src="" style="width: 40px;height: 40px;">
                    <p>teclado gamer</p>
                    <p>R$ 20100</p>
                </div>`;
            })}
        <div>
    </div>`);
}
