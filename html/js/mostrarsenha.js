var showpassword = false

window.addEventListener("load", function () {
  $('.visualizar_senha').click(function () {
    var button = $('.visualizar_senha')
    if (button.attr('src') === 'html/imagens/ocult/hide.png') {
      button.attr('src', 'html/imagens/ocult/view.png')
      $("#password").attr("type", "text")
    } else {
      button.attr('src', 'html/imagens/ocult/hide.png')
      $("#password").attr("type", "password")
    }
  })
})

