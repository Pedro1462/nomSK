<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajas</title>
</head>

<body>
    <div class="container">
        <h1><strong>Insertar Baja</strong></h1>

        <section class="formulario">
            <form action="index.php?c=bajas&a=inicio" method="post" enctype="multipart/form-data">
                <div class="container">

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechabajaInput" name="fechabaja"
                            placeholder="fecha de baja" required />
                        <label for="fechabajaInput">Fecha de Baja</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="busquedaNombreAlta" name="busquedaNombreAlta"
                            placeholder="Buscar nombre de empleado desde Altas" autocomplete="off" />
                        <label for="busquedaNombreAlta">Buscar Nombre</label>
                        <div id="sugerenciasNombreAlta" class="sugerencias-lista"></div>
                        <input type="hidden" id="idEmpleadoAlta" name="idEmpleadoAlta" />
                        <button type="button" id="buscarEmpleadoAltaBtn" class="btn btn-secondary mt-2">Buscar Empleado</button>
                    </div>


                    Selecciona un estado de correo:
                    <select name="correo">
                        <option value="1">Enviado</option>
                        <option value="2">Pendiente</option>
                        <option value="3">No solicitado</option>
                    </select>
                    <br>

                    Selecciona un estado del Finiquito:
                    <select name="edofiniquito">
                        <option value="1">Procesado</option>
                        <option value="2">Sin Procesar</option>
                        <option value="3">No solicitado</option>
                    </select>
                    <br>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-personalizado">Confirmar</button>
                        <a href="index.php?c=menubajas" class="btn btn-personalizado">Cancelar</a>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <script src="../../script/scriptConsultaNombreenAltas.js"></script>
</body>

</html>