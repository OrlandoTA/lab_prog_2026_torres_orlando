import { customerController } from './controller.js';
import { view } from './view.js';

document.addEventListener('DOMContentLoaded', () => {
    
    view.init();
    
    // Cargar usuarios al abrir la página
    customerController.list();


    const btnCrear = document.querySelector('.btn-altas');

    btnCrear.addEventListener('click', () =>{
             window.location.href ='?controller=customer&action=create';
    })


    // ==========================
    // EXPORTAR PDF
    // ==========================

    const btnExportar = document.querySelector('.btn-exportar');

    btnExportar.addEventListener('click' , () =>{
        customerController.exportTablaPDF('#tabla-clientes');
    })

    // ==========================
    // BUSCAR
    // ==========================
    const btnBuscar = document.querySelector('.btn-buscar');
    const inputBuscar = document.getElementById('input-buscar');

    btnBuscar.addEventListener('click', async () => {
        await customerController.list({
            buscar: inputBuscar.value.trim(),
        });

    });

    // ==========================
    // FILTROS
    // ==========================
    const filtro = document.getElementById('filtro-categoria');

    filtro.addEventListener('change', async () => {

        await customerController.list({
            ordenar: filtro.value,
            buscar: inputBuscar.value.trim(),
        });
        
    });


    document.getElementById('tbody-clientes').onclick = (e) => {

        const boton = e.target.closest('.btn-editar');

        if (!boton) return;

        const id = boton.dataset.id;

        window.location.href =
            `?controller=customer&action=edit&id=${id}`;

    };
 
})