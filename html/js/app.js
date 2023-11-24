// Definindo o array para armazenar os itens do carrinho
let carrinhoItens = [];

// Função para adicionar um produto ao carrinho
function adicionarAoCarrinho(nome, preco) {
    // Verificar se o produto já está no carrinho
    const produtoExistente = carrinhoItens.find(item => item.nome === nome);

    if (produtoExistente) {
        // Se o produto já estiver no carrinho, apenas atualize a quantidade
        produtoExistente.quantidade++;
    } else {
        // Caso contrário, adicione um novo item ao carrinho
        const novoItem = {
            nome: nome,
            preco: preco,
            quantidade: 1
        };
        carrinhoItens.push(novoItem);
    }

    // Atualizar a exibição do carrinho
    exibirCarrinho();
}

// Função para exibir os itens no carrinho
function exibirCarrinho() {
    const tabelaCarrinho = document.getElementById('$produtosTabela');
    const totalCompraElement = document.getElementById('$totalCompra');
    let totalCompra = 0;

    // Limpar a tabela antes de atualizar
    tabelaCarrinho.innerHTML = '';

    // Iterar sobre os itens do carrinho e criar elementos HTML para cada um
    for (let i = 0; i < carrinhoItens.length; i++) {
        const item = carrinhoItens[i];
        const totalItem = item.preco * item.quantidade;

        // Adicionar linha à tabela
        const linha = document.createElement('tr');
        linha.innerHTML = `
            <td>${item.nome}</td>
            <td>R$ ${item.preco.toFixed(2)}</td>
            <td>${item.quantidade}</td>
            <td>R$ ${totalItem.toFixed(2)}</td>
            <td><button class="btn btn-danger" onclick="removerDoCarrinho(${i})">Remover</button></td>
        `;
        tabelaCarrinho.appendChild(linha);

        // Atualizar o total da compra
        totalCompra += totalItem;
    }

    // Atualizar o total da compra no rodapé
    totalCompraElement.textContent = `R$ ${totalCompra.toFixed(2)}`;
}

// Função para remover um item do carrinho
function removerDoCarrinho(index) {
    carrinhoItens.splice(index, 1);
    exibirCarrinho();
}

// Chame a função exibirCarrinho para inicializar a exibição do carrinho
exibirCarrinho();
