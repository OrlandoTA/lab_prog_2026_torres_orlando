import { userController } from './controller.js';

document.addEventListener('DOMContentLoaded', async () => {

    // Cargar usuarios al abrir la página
    await userController.list();

    // ==========================
    // BUSCAR
    // ==========================
    const btnBuscar = document.querySelector('.btn-buscar');
    const inputBuscar = document.getElementById('input-buscar');

    btnBuscar?.addEventListener('click', async () => {

        const texto = inputBuscar.value.trim();

        await userController.list({
            nombres: texto
        });

    });

    // Buscar con Enter
    inputBuscar?.addEventListener('keydown', async (e) => {

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

    filtro?.addEventListener('change', async () => {

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

});