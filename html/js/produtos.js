

$(function () {
    getProducts().then((products) => {
        console.log({ products });

        initiateProducts(products);

        var items_count = localStorage.getItem("items") ? converted_array(localStorage.getItem("items")).length : 0
        var link_sacola = $("[name='_sacola']")
        link_sacola.html(items_count + ' itens em sua sacola')

        $('.btn-add').click(function () {
            var captura_id = $(this).attr('id');
            console.log(captura_id)
            let array = converted_array(localStorage.getItem("items"));

            array.push(captura_id);
            localStorage.setItem("items", JSON.stringify(array));
            link_sacola.html(array.length + ' itens em sua sacola');
            $.toast({
                heading: 'Item Adicionado',
                text: `Seu item foi adicionado no carrinho`,
                position: 'top-right',
                stack: false,
                bgColor: '#9400D3',
                textColor: 'white'
            })
        });

        $('.btn-remove').click(function () {
            let productId = $(this).attr('id');
            let itemsId = converted_array(localStorage.getItem("items"));
            console.log(productId)
            let productToBeRemoved = itemsId.findIndex(item => item == productId);

            if (productToBeRemoved !== -1) {
                itemsId.splice(productToBeRemoved, 1);
                console.log(products[productToBeRemoved])
                $.toast({
                    heading: `Item removido - ${products[productToBeRemoved].nome.split(", ")[0]}`,
                    text: 'Seu item foi removido no carrinho',
                    position: 'top-right',
                    stack: false,
                    icon: 'warning',
                    bgColor: '#f76420',
                    textColor: 'white'
                })
            }

            localStorage.setItem("items", JSON.stringify(itemsId));
            link_sacola.html(itemsId.length + ' itens em sua sacola');
        })
    });
})

function converted_array(json_string) {
    array = JSON.parse(json_string);
    let arr = [];

    for (let i in array)
        arr.push(array[i]);

    return arr;
}


function removeItem(_listaProdutos, produto) {
    let indice = _listaProdutos.indexOf(produto);

    if (indice > -1) {
        _listaProdutos.splice(indice, 1);
    }
}


function verificaItem(__listaProdutos, _produto) {
    if (__listaProdutos.includes(_produto)) {
        let strProduto = _produto
        removeItem(__listaProdutos, strProduto)
    }
}


function initiateProducts(products) {
    var class_main_div = $(".prod");
    let array = converted_array(localStorage.getItem("items"));

    products.forEach((value) => {
        class_main_div.append(`
<section class="PROD-un">
          <a href="#">
              <img src="${value.url_image}">
              <p class="PROD-nome">${value.NomeProduto}</p>
             ${array.includes(String(value.idProdutos))
                ?
                "<p style='color:red'>Item ja esta no carrinho</p>" : ""}
          </a>
          <p class="PROD-val"><br/>R$${value.precoproduto}<br/></p>
          <button class='add_cart_btn btn-add' id="${value.idProdutos}">ADICIONAR AO CARRINHO</button>
</section>
`)
    })
}


async function getProducts() {
    try {
        const data = await fetch("http://localhost/Projeto%20Banco%20de%20Dados/html/ajax/produto.php");
        const result = await data.json();

        console.log("Success:", result);

        return result;
    } catch (error) {
        console.log(error.message);
        throw error;
    }
}