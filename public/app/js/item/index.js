import { view } from './view.js';
import { controller } from './controller.js';

document.addEventListener('DOMContentLoaded', () => {
    // Se inicializan las librerias externas
    view.init();

    // Se agrega funcionalidad a los botones de la vista
    document.querySelector('#btnList').onclick = () => {
        controller.list();
    };

    document.querySelector('#btnNewItem').onclick = () => {
        window.location.href = 'app/resources/views/item/create.php';
    };

    // Se relizan peticiones asincronas para cargar datos en al vista
    
});