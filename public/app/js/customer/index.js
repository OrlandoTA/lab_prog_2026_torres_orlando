document.addEventListener('DOMContentLoaded', () => {
    const btnCrear = document.querySelector('.btn-altas');

    btnCrear.addEventListener('click', () =>{
             window.location.href ='?controller=customer&action=create';
    })
 
})