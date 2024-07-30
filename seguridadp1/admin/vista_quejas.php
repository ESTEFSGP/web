<!doctype html>
<html lang="es">

<head>
    <title>AdminSeguridadPublicaQuejas</title>
    <!-- Meta etiquetas requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
    <header>
        <b href="#" class="logo">
            <img src="logo 1.jpg" alt="logo uno">
            <img src="logo2.png" alt="logo dos">
            <img src="logo 3.png" alt="logo tres">
            <h1 class="SEGURIDAD PUBLICA ISIDRO FABELA">SEGURIDAD PÚBLICA ISIDRO FABELA</h1>
        </b>
    </header>
    <hr class="separator">
    <?php include('quej.php'); ?>

    <div class="header">
        <h1>Quejas y Sugerencias.</h1>
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
                        <th scope="col">¿Quejas O Sugerencias?</th>
                        <th scope="col">Descripción de quejas o sugerencias:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaProductos as $mos) { ?>
                        <tr>
                            <td><?php echo $mos['tipo']; ?></td>
                            <td><?php echo $mos['texto']; ?></td>
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
            const doc = new jsPDF('landscape', 'pt', 'a5'); // Cambiar a tamaño A3

            const logo1 = await loadImage('logo 1.jpg'); // URL de tu primer logo o ruta local
            const logo2 = await loadImage('logo2.png'); // URL de tu segundo logo o ruta local

            
            doc.addImage(logo1, 'PNG', 5, 5, 100, 55);
            doc.addImage(logo2, 'PNG', doc.internal.pageSize.getWidth() - 160, 5, 100, 50); // Posición ajustada para el segundo logo

            
            doc.setFontSize(16);
            doc.text('Quejas o Sujerencias.', doc.internal.pageSize.getWidth() / 2, 50, { align: 'center' });

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


            });

            doc.save('quejasosujerencias.pdf');
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
