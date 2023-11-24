window.addEventListener("load", function() {
    const voltar_ao_topo = document.querySelector('#voltar_ao_topo');
    
    window.addEventListener("scroll", scrollFunction);

    voltar_ao_topo.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

function scrollFunction() {
    const scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
    voltar_ao_topo.style.display = scrollTop > 20 ? "block" : "none";
}
