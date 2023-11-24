
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('.form');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Impede o envio padrão do formulário

            // Obtém os dados do formulário
            var name = document.querySelector('input[name="name"]').value;
            var email = document.querySelector('input[name="email"]').value;
            var message = document.querySelector('textarea[name="masage"]').value;

            // Simula uma requisição assíncrona (substitua isso pela sua lógica de envio real)
            setTimeout(function () {
                // Exibe um alerta com os dados do formulário
                alert('Nome: ' + name + '\nE-mail: ' + email + '\nMensagem: ' + message);

                // Limpa os campos do formulário
                form.reset();
            }, 500); // Tempo de espera simulado de 0,5 segundos
        });
    });

