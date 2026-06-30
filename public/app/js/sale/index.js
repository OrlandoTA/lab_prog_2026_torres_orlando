import { saleController } from './controller.js';
import { view } from './view.js'


document.addEventListener('DOMContentLoaded', () => {
    const btnCrear = document.querySelector('.btn-altas');

    btnCrear.addEventListener('click', ()  =>{

        window.location.href ='?controller=sale&action=create'
    })
})