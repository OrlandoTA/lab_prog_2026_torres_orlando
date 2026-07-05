<?php
    ob_start();
?>
<h1 title="Listado de productos registrados">
        <ion-icon name="basket-outline" title="Productos"></ion-icon>
        Lista de Productos
</h1>


        <table class="tabla" title="Tabla con listado de productos">
           <thead>
                <tr>
                    <th title="Nombre del producto">NOMBRE</th>
                    <th title="Autor del producto">AUTOR</th>
                    <th title="Código del producto">CÓDIGO</th>
                    <th title="Descripción del producto">DESCRIPCIÓN</th>
                    <th title="Precio del producto">PRECIO</th>
                    <th title="Cantidad disponible en stock">STOCK</th>
                    <th title="Opciones disponibles">OPCIONES</th>
                </tr>
           </thead> 
            <tbody >
                    <?php foreach($items as $item): ?>
                        <tr>
                            <td><?= $item['nombre']?></td>
                            <td><?= $item['autor']?></td>
                            <td><?= $item['codigo']?></td>
                            <td><?= $item['descripcion']?></td>
                            <td><?= $item['precio']?></td>
                            <td><?= $item['stock']?></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            
        </table>

    <?php
        

        require_once __DIR__ . '/../../../vendor/autoload.php';
        $html = ob_get_clean();

        

        $dompdf = new \Dompdf\Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'Landscape');

        $dompdf->render();

        $dompdf->stream("listaProductos.pdf", array("Attachment" => false));
    ?>
