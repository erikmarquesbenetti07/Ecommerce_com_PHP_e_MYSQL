function validarForm() {
    var NomeProduto = document.getElementById('NomeProduto').value;
    var precoproduto = document.getElementById('precoproduto').value;
    var saldoproduto = document.getElementById('saldoproduto').value;

    // Validar se os campos obrigatórios estão preenchidos
    if (NomeProduto.trim() === '' || precoproduto.trim() === '' || saldoproduto.trim() === '') {
        alert('Por favor, preencha todos os campos obrigatórios.');
        return false;
    }

    // Validar se preço e saldo são numéricos
    if (isNaN(precoproduto) || isNaN(saldoproduto)) {
        alert('Os campos de preço e saldo devem conter valores numéricos.');
        return false;
    }

    console.log('Formulário enviado!');
    return true;
  }