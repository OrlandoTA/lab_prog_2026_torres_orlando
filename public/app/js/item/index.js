
import { itemController } from './controller.js';
import { view } from './view.js';

document.addEventListener('DOMContentLoaded', () => {
     view.init();
    // Cargar usuarios al abrir la página
    itemController.list();

    // ==========================
    // BUSCAR
    // ==========================
    const btnBuscar = document.querySelector('.btn-buscar');
    const inputBuscar = document.getElementById('input-buscar');

    btnBuscar.addEventListener('click', async () => {
        const texto = inputBuscar.value.trim();

        await itemController.list({
            nombres: texto
        });

    });

    // Buscar con Enter
    inputBuscar.addEventListener('keydown', async (e) => {

        if (e.key === 'Enter') {

            e.preventDefault();

            const texto = inputBuscar.value.trim();

            await itemController.list({
                nombres: texto
            });

        }

    });

    // ==========================
    // FILTROS
    // ==========================
    const filtro = document.getElementById('filtro-categoria');

    filtro.addEventListener('change', async () => {

        const value = filtro.value;

        switch (value) {

            case 'tipo-operador':

                await itemController.list({
                    perfil: 'Operador'
                });

                break;

            case 'tipo-Administrador':

                await itemController.list({
                    perfil: 'Administrador'
                });

                break;

            default:

                await itemController.list();

                break;
        }

    });

    // ==========================
    // EXPORTAR PDF
    // ==========================
    itemController.exportPDF();

    document.getElementById('tbody-productos').onclick = (e) => {

        const boton = e.target.closest('.btn-editar');

        if (!boton) return;

        const id = boton.dataset.id;

        window.location.href =
            `?controller=item&action=edit&id=${id}`;

    };

    document.querySelector('.btn-altas').addEventListener('click', () => {
        window.location.href = '?controller=item&action=create';
    });

});