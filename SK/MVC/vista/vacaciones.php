<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Vaciones</title>
</head>

<body>
    <div class="container">
        <h1><strong>Insertar Vacaciones</strong></h1>

        <section class="formulario">
            <form action="index.php?c=vacaciones&a=inicio" method="post" enctype="multipart/form-data">
                <div class="container">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="busquedaNombreAlta" name="busquedaNombreAlta"
                            placeholder="Buscar nombre de empleado desde Altas" autocomplete="off" />
                        <label for="busquedaNombreAlta">Buscar Nombre</label>
                        <div id="sugerenciasNombreAlta" class="sugerencias-lista"></div>
                        <input type="hidden" id="idEmpleadoAlta" name="idEmpleadoAlta" />
                        <button type="button" id="buscarEmpleadoAltaBtn" class="btn btn-secondary mt-2">Buscar Empleado</button>
                    </div>

                    <br>
                    Selecciona el estado de las vacaciones:
                    <select name="estadovacaciones">
                        <option value="1">Trabajados</option>
                        <option value="2">Tomados</option>
                        <option value="3">Pendiente</option>
                    </select>
                    <br>

                    <br>
                    Selecciona el estado de las pago:
                    <select name="estadopago">
                        <option value="1">Pagado</option>
                        <option value="2">Pendiente</option>
                    </select>
                    <br>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="diasTomadosInput" name="diasTomados"
                            placeholder="diasTomados" required />
                        <label for="diasTomadosInput">Dias Tomados</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaIniInput" name="fechaIni"
                            placeholder="fecha Inicial de Vacaciones" required />
                        <label for="fechaIniInput">Fecha de Inicial</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechafinalInput" name="fechafinal"
                            placeholder="fecha de Final de Vacaciones" required />
                        <label for="fechafinalInput">Fecha de Final</label>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-personalizado">Confirmar</button>
                        <a href="index.php?c=menuVacaciones" class="btn btn-personalizado">Cancelar</a>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <script src="../../script/scriptConsultaNombreenAltas.js"></script>

</body>

</html>