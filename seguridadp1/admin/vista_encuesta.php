<!doctype html>
<html lang="es">
<head>
    <title>AdminSeguridadPublicaEncuesta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
        }

        b {
            text-decoration: none;
            color:#001f3f;
            align-items: center;
        }

        header {
            display: flex;
            min-height: 70px;
            background-color: #fff;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 100px;
            margin-right: 35px;
        }

        nav a {
            font-weight: 600;
            padding-right: 10px;
        }

        nav a:hover {
            color: aliceblue;
        }

        @media (max-width: 700px) {
            header {
                flex-direction: column;
            }

            nav {
                padding: 10px 0px;
            }
        }

        a {
            display: block;
            margin-top: 50px;
            width: 150px;
            background-color: #001f3f;
            padding: 15px;
            border-radius: 10px;
            text-decoration: none;
            color: white;
        }

        body {
            background-color: #f8f9fa;
        }

        .header {
            background-color: #4ca1f5;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .separator {
            border: none;
            height: 5px;
            background-color: #001f3f;
            margin: -5px 0;
        }

        .navbar {
            background-color: #4ca1f5;
            color: white;
            padding: 10px 0;
        }

        .table {
            width: 100%;
            background-color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            font-size: 12px;
            word-wrap: break-word;
        }

        .table th {
            background-color: #4ca1f5;
            color: white;
        }

        .table-responsive {
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .table th:nth-child(18),
        .table td:nth-child(18),
        .table th:nth-child(19),
        .table td:nth-child(19) {
            max-width: 400px;
        }

        .btn-custom {
            width: 100px;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include('encu.php'); ?>
    <header>
        <b href="#" class="logo">
            <img src="logo 1.jpg" alt="logo uno">
            <img src="logo2.png" alt="logo dos">
            <img src="logo 3.png" alt="logo tres">
            <h1 class="SEGURIDAD PUBLICA ISIDRO FABELA">SEGURIDAD PÚBLICA ISIDRO FABELA</h1>
        </b>
    </header>

    <hr class="separator">

    <div class="header">
        <h1>Respuestas de encuesta de satisfacción.</h1>
    </div>

    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-3">
            <form method="POST" action="" onsubmit="return confirm('¿Está seguro que quiere borrar los datos?');">
                <input type="hidden" name="clearTable" value="1">
                <button type="submit" class="btn btn-danger me-2 btn-custom">Borrar Datos</button>
            </form>
            <button id="downloadPdf" class="btn btn-primary me-2 btn-custom">Descargar PDF</button>
            <a href="admin.html" class="btn btn-secondary btn-custom">VOLVER</a>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Colonia</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Percepción de la Seguridad</th>
                        <th scope="col">Identifica Policía Municipal</th>
                        <th scope="col">Identifica Policía Estatal</th>
                        <th scope="col">Identifica Policía Nacional</th>
                        <th scope="col">Identifica Ejército</th>
                        <th scope="col">Identifica Marina</th>
                        <th scope="col">Ha visto Vandalismo</th>
                        <th scope="col">Ha visto Consumo de Alcohol en las Calles</th>
                        <th scope="col">Ha visto Robos o Asaltos</th>
                        <th scope="col">Ha visto Bandas Violentas o Pandillerismo</th>
                        <th scope="col">Ha visto Venta o Consumo de Droga</th>
                        <th scope="col">Ha visto/Escuchado Disparos Frecuentes con Armas</th>
                        <th scope="col">Ha visto Robo o Venta Ilegal de Gasolina Diésel</th>
                        <th scope="col">¿Considera el desempeño de la Policía Municipal de Isidro Fabela?</th>
                        <th scope="col">¿Cuánta confianza le inspira la Policía Municipal de Isidro Fabela?</th>
                        <th scope="col">¿Ha notado la presencia de la Policía Municipal?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaProductos as $producto) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($producto['edad']); ?></td>
                            <td><?php echo htmlspecialchars($producto['colonia']); ?></td>
                            <td><?php echo htmlspecialchars($producto['municipio']); ?></td>
                            <td><?php echo htmlspecialchars($producto['percepcion_seguridad']); ?></td>
                            <td><?php echo htmlspecialchars($producto['pm']); ?></td>
                            <td><?php echo htmlspecialchars($producto['pe']); ?></td>
                            <td><?php echo htmlspecialchars($producto['gn']); ?></td>
                            <td><?php echo htmlspecialchars($producto['ej']); ?></td>
                            <td><?php echo htmlspecialchars($producto['ma']); ?></td>
                            <td><?php echo htmlspecialchars($producto['van']); ?></td>
                            <td><?php echo htmlspecialchars($producto['cons']); ?></td>
                            <td><?php echo htmlspecialchars($producto['rotos']); ?></td>
                            <td><?php echo htmlspecialchars($producto['bansmo']); ?></td>
                            <td><?php echo htmlspecialchars($producto['vesumo']); ?></td>
                            <td><?php echo htmlspecialchars($producto['disp']); ?></td>
                            <td><?php echo htmlspecialchars($producto['huachi']); ?></td>
                            <td><?php echo htmlspecialchars($producto['desem']); ?></td>
                            <td><?php echo htmlspecialchars($producto['confianza']); ?></td>
                            <td><?php echo htmlspecialchars($producto['pres']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS y Popper.js v5.2.1 (Opcional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('downloadPdf').addEventListener('click', async function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('landscape', 'pt', 'a3'); // Cambiar a tamaño A3

            // Cargar las imágenes de los logos
            const logo1 = await loadImage('logo 1.jpg'); // URL de tu primer logo o ruta local
            const logo2 = await loadImage('logo2.png'); // URL de tu segundo logo o ruta local

            // Agregar los logos al PDF (x, y, width, height)
            doc.addImage(logo1, 'PNG', 10, 10, 150, 75);
            doc.addImage(logo2, 'PNG', doc.internal.pageSize.getWidth() - 160, 10, 150, 75); // Posición ajustada para el segundo logo

            // Agregar el título o cualquier otro texto
            doc.setFontSize(16);
            doc.text('Encuestas al ciudadano.', doc.internal.pageSize.getWidth() / 2, 50, { align: 'center' });

            doc.autoTable({
                html: '#dataTable',
                startY: 100, // La tabla comenzará después de las imágenes
                theme: 'grid',
                headStyles: {
                    fillColor: [76, 161, 245],
                    textColor: [255, 255, 255],
                    fontStyle: 'bold',
                    halign: 'center',
                },
                bodyStyles: {
                    halign: 'center',
                    fontSize: 10, // Reduce el tamaño de la fuente aún más
                },
                styles: {
                    overflow: 'linebreak',   // Rompe las líneas de texto dentro de las celdas
                    cellWidth: 57,           // Ancho fijo de las celdas (puedes ajustarlo según necesites)
                    cellPadding: 1,          // Relleno dentro de las celdas
                    fontSize: 10,        
                },
                columnStyles: {
                    0: { cellWidth: 50 },
                    1: { cellWidth: 20 },
                    2: { cellWidth: 50 },
                    3: { cellWidth: 50 },
                    4: { cellWidth: 50 },
                    5: { cellWidth: 50 },
                    6: { cellWidth: 50 },
                    7: { cellWidth: 50 },
                    8: { cellWidth: 50 },
                    9: { cellWidth: 50 },
                    10: { cellWidth: 50 },
                    11: { cellWidth: 50 },
                    12: { cellWidth: 50 },
                    13: { cellWidth: 50 },
                    14: { cellWidth: 50 },
                    15: { cellWidth: 50 },
                    16: { cellWidth: 50 },
                    17: { cellWidth: 50 },
                    18: { cellWidth: 50 },
                    19: { cellWidth: 50 },
                },
            });

            doc.save('encuesta.pdf');
        });
    });

    function loadImage(url) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.crossOrigin = 'Anonymous';
            img.src = url;
            img.onload = () => resolve(img);
            img.onerror = err => reject(err);
        });
    }
</script>


</body>
</html>
