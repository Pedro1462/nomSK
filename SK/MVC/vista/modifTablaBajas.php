<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambios en Bajas</title>
</head>

<body>

    <div class="container">
        <h1><strong>Modificaciones en la Tabla de Bajas</strong></h1>

        <section class="formulario">
            <form action="index.php?c=modificacionesdeTablaBaja&a=inicio" method="post" enctype="multipart/form-data">
                <div class="container">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="busquedaNombreAlta" name="busquedaNombreAlta"
                            placeholder="Buscar nombre de empleado desde Altas" autocomplete="off" />
                        <label for="busquedaNombreAlta">Buscar Nombre</label>
                        <div id="sugerenciasNombreAlta" class="sugerencias-lista"></div>
                        <input type="hidden" id="idEmpleadoAlta" name="idEmpleadoAlta" />
                        <button type="button" id="buscarEmpleadoAltaBtn" class="btn btn-secondary mt-2">Buscar Empleado</button>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-personalizado">Confirmar</button>
                        <a href="index.php?c=menudelasactualizaciones" class="btn btn-personalizado">Cancelar</a>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <h1>Datos del Empleado</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?c=modificacionesdeTablaBaja&a=actualizar" method="post">
                        <table class="table table-hover" id="sampleTable1">
                            <tr>
                                <th>id_alta</th>
                                <th>Nombre del Empleado</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Estado de Correo</th>
                                <th>Estado de Finiquito</th>
                                <th>Fecha de Baja</th>
                            </tr>


                            <?php if (!empty($resultado)): ?>
                                <?php foreach ($resultado as $empleado): ?>
                                    <tr>
                                        <td><input type="text" name="id_alta" value="<?= htmlspecialchars($empleado['id_alta']) ?>"></td>
                                        <td><input type="text" name="nombreEmpleado" value="<?= htmlspecialchars($empleado['nombreEmpleado']) ?>"></td>
                                        <td><input type="text" name="apellidoPaterno" value="<?= htmlspecialchars($empleado['apellidoPaterno']) ?>"></td>
                                        <td><input type="text" name="apellidoMaterno" value="<?= htmlspecialchars($empleado['apellidoMaterno']) ?>"></td>
                                        <td><input type="text" name="estadoCorreo" value="<?= htmlspecialchars($empleado['estadoCorreo']) ?>"></td>
                                        <td><input type="text" name="estadoFiniquito" value="<?= htmlspecialchars($empleado['estadoFiniquito']) ?>"></td>
                                        <td><input type="text" name="fechaBaja" value="<?= htmlspecialchars($empleado['fechaBaja']) ?>"></td>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9">No se encontraron datos.</td>
                                </tr>
                            <?php endif; ?>

                        </table>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </form>


                    <script src="../../script/scriptConsultaNombre.js"></script>
                    <script src="../../script/scriptConsultaNombreenAltas.js"></script>


</body>

</html>