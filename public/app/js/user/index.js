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

        const texto = inputBuscar.value.trim();

        await userController.list({
            nombres: texto
        });

    });

    // Buscar con Enter
    inputBuscar.addEventListener('keydown', async (e) => {

        if (e.key === 'Enter') {

            e.preventDefault();

            const texto = inputBuscar.value.trim();

            await userController.list({
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

                await userController.list({
                    perfil: 'Operador'
                });

                break;

            case 'tipo-Administrador':

                await userController.list({
                    perfil: 'Administrador'
                });

                break;

            default:

                await userController.list();

                break;
        }

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