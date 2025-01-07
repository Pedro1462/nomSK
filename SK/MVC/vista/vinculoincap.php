<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinculo de Incapacidades</title>
</head>

<body>
    <div class="container">
        <h1><strong>Vincular Incapacidad al Empleado</strong></h1>
        <section class="formulario">
            <form action="index.php?c=vinculoincapacidad&a=inicio" method="post" enctype="multipart/form-data">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="busquedaNombre" name="busquedaNombre"
                        placeholder="Buscar nombre de empleado" autocomplete="off" />
                    <label for="busquedaNombre">Buscar Nombre</label>
                    <div id="sugerenciasNombre" class="sugerencias-lista"></div>
                    <input type="hidden" id="idEmpleado" name="idEmpleado" />
                    <button type="button" id="buscarEmpleadoBtn" class="btn btn-secondary mt-2">Buscar Empleado</button>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="serieInput" name="serie"
                        placeholder="serie" required />
                    <label for="serieInput">Serie y Folio</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="ramoseguroInput" name="ramoseguro"
                        placeholder="ramoseguro" required />
                    <label for="ramoseguroInput">Numero de Incapacidad Ingresada anteriormente</label>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-personalizado">Confirmar</button>
                    <a href="index.php?c=menuincap" class="btn btn-personalizado">Cancelar</a>
                </div>


            </form>
        </section>
    </div>

    <script src="../../script/scriptConsultaNombre.js"></script>
</body>

</html>