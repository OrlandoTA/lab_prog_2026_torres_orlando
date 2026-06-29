
import { userController } from './controller.js';
import { view } from './view.js';

document.addEventListener('DOMContentLoaded', async () => {
    view.init();
    // Cargar usuarios al abrir la página
    userController.list();

    // ==========================
    // BUSCAR
    // ==========================
    const btnBuscar = document.querySelector('.btn-buscar');
    const inputBuscar = document.getElementById('input-buscar');

    btnBuscar.addEventListener('click', async () => {
        await userController.list({
            buscar: inputBuscar.value.trim(),
        });

    });



       // ==========================
    // FILTROS
    // ==========================
    const filtro = document.getElementById('filtro-categoria');

    filtro.addEventListener('change', async () => {

        await userController.list({
            ordenar: filtro.value,
            buscar: inputBuscar.value.trim(),
        });
       
    });

    // ==========================
    // EXPORTAR PDF
    // ==========================
    userController.exportPDF();

    document.getElementById('tbody-usuarios').onclick = (e) => {

        const boton = e.target.closest('.btn-editar');

        if (!boton) return;

        const id = boton.dataset.id;

        window.location.href =
            `?controller=user&action=edit&id=${id}`;

    };

    document.querySelector('.btn-altas').addEventListener('click', () => {
        window.location.href = '?controller=user&action=create';
    });
}); 