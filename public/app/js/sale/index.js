import { saleController } from './controller.js';
import { viewSale } from './view.js'


document.addEventListener('DOMContentLoaded', () => {

    viewSale.init();
    
    saleController.list();
    const btnCrear = document.querySelector('.btn-altas');
    const fecha_inicio = document.getElementById("fecha-inicio");
    const fecha_fin = document.getElementById("fecha-hasta")
    const btnExportar = document.querySelector('.btn-exportar');



    

    btnCrear.addEventListener('click', ()  =>{

        window.location.href ='?controller=sale&action=create'
    })

    // ==========================
    // BUSCAR
    // ==========================
    const btnBuscar = document.querySelector('.btn-buscar');
    const inputBuscar = document.getElementById('input-buscar');
    

    btnBuscar.addEventListener('click', async () => {
        await saleController.list({
            buscar: inputBuscar.value.trim(),
        });

    });


        // ==========================
        // FILTROS
        // ==========================
        const filtro = document.getElementById('filtro-categoria');
    
        filtro.addEventListener('change', async () => {
    
            await saleController.list({
                ordenar: filtro.value,
                buscar: inputBuscar.value.trim(),
            });
           
        });

        btnBuscar.addEventListener("click", async () => {

            await saleController.list({
                fecha_inicio: fecha_inicio.value.trim(),
                fecha_fin: fecha_fin.value.trim(),
                buscar: inputBuscar.value.trim()
            });

        });
    
        // ==========================
        // EXPORTAR PDF
        // ==========================
        btnExportar.addEventListener('click', ()=>{
            saleController.exportTablaPDF("#tabla-ventas")
        })
        
        document.getElementById('tbody-ventas').onclick = (e) => {
    
            const boton = e.target.closest('.btn-editar');
    
            if (!boton) return;
    
            const id = boton.dataset.id;
    
            window.location.href =
                `?controller=sale&action=edit&id=${id}`;
    
        };


})