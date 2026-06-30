document.addEventListener('DOMContentLoaded', () => {
    const btnUsuarios = document.getElementById('irUsuarios');
    const btnProducto = document.getElementById('irProductos');


    btnUsuarios.addEventListener('click', () =>{
             window.location.href ='?controller=user&action=index';
    })
    btnProducto.addEventListener('click', () =>{
         window.location.href ='?controller=item&action=index';
    })
})