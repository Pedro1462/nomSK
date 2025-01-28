<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Solicitudes de Modificaciones</title>
</head>

<body>
    <div class="container">
        <h1><strong>Insertar una Solicitud de Modificaciones</strong></h1>

        <section class="formulario">
            <form action="index.php?c=solicitudesModificacion&a=inicio" method="post" enctype="multipart/form-data">
                <div class="container">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="busquedaNombreAlta" name="busquedaNombreAlta"
                            placeholder="Buscar nombre de empleado desde Altas" autocomplete="off" />
                        <label for="busquedaNombreAlta">Buscar Nombre</label>
                        <div id="sugerenciasNombreAlta" class="sugerencias-lista"></div>
                        <input type="hidden" id="idEmpleadoAlta" name="idEmpleadoAlta" />
                        <button type="button" id="buscarEmpleadoAltaBtn" class="btn btn-secondary mt-2">Buscar Empleado</button>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaSolicitudInput" name="fechaSolicitud"
                            placeholder="fecha de Solicitud" required />
                        <label for="fechaSolicitudInput">Fecha de Solicitud</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaRecibidoInput" name="fechaRecibido"
                            placeholder="fecha de Recibido" required />
                        <label for="fechaRecibidoInput">Fecha de Recibido</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaAplicacionInput" name="fechaAplicacion"
                            placeholder="fecha de Aplicacion" required />
                        <label for="fechaAplicacionInput">Fecha de Aplicacion</label>
                    </div>

                    <br>
                    Selecciona un tipo de Modificacion:
                    <select name="tipoModif">
                        <option value="1">Antiguedad</option>
                        <option value="2">Bono Variable</option>
                        <option value="3">Bono Cubre Gerente</option>
                        <option value="4">Descanso</option>
                        <option value="5">Puesto</option>
                        <option value="6">Sucursal</option>
                        <option value="7">Sueldo</option>
                    </select>
                    <br>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="modifAntInput" name="modifAnt"
                            placeholder="modifAnt" required />
                        <label for="modifAntInput">Modificacion Anterior</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="modifNuevInput" name="modifNuev"
                            placeholder="modifNuev" required />
                        <label for="modifNuevInput">Modificacion Nueva</label>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-personalizado">Confirmar</button>
                        <a href="index.php" class="btn btn-personalizado">Cancelar</a>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <script src="../../script/scriptConsultaNombreenAltas.js"></script>

</body>

</html>