<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Codigo Postal</title>
</head>

<body>

    <div class="container">
        <h1><strong>Insertar Nuevo Codigo Postal</strong></h1>

        <section class="formulario">

            <form action="index.php?c=insCodigoP&a=inicio" method="post" enctype="multipart/form-data">

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="codigoPInput" name="codigoP"
                        placeholder="codigoP" required />
                    <label for="codigoPInput">Codigo Postal</label>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-personalizado">Confirmar</button>
                    <a href="index.php" class="btn btn-personalizado">Cancelar</a>
                </div>

            </form>

        </section>

    </div>

</body>

</html>