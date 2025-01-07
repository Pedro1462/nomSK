<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajas por nombre</title>
</head>

<body>
    <h1>Consulta de Bajas por Nombre</h1>

    <section class="formulario">
        <form action="index.php?c=consultabajaspornombre&a=inicio" method="post" enctype="multipart/form-data">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreEmpleadoInput" name="nomEmpleado"
                    placeholder="nomEmpleado" required />
                <label for="nombreEmpleadoInput">Nombre del Empleado</label>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-personalizado">Buscar</button>
                <a href="index.php?c=menubajas" class="btn btn-personalizado">Cancelar</a>
            </div>
        </form>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover" id="sampleTable">
                        <thead>
                            <tr>
                                <th>id_baja</th>
                                <th>Fecha de Baja </th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombre del Empleado</th>
                                <th>Sucursal</th>
                                <th>Razon Social</th>
                                <th>Estado del Correo</th>
                                <th>Estado del Finiquito</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($resultado)): ?>
                                <?php foreach ($resultado as $empleado): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($empleado['id_baja']) ?></td>
                                        <td><?= htmlspecialchars($empleado['fechaBaja']) ?></td>
                                        <td><?= htmlspecialchars($empleado['apellidoPaterno']) ?></td>
                                        <td><?= htmlspecialchars($empleado['apellidoMaterno']) ?></td>
                                        <td><?= htmlspecialchars($empleado['nombreEmpleado']) ?></td>
                                        <td><?= htmlspecialchars($empleado['sucursales']) ?></td>
                                        <td><?= htmlspecialchars($empleado['razonSocial']) ?></td>
                                        <td><?= htmlspecialchars($empleado['estadoCorreo']) ?></td>
                                        <td><?= htmlspecialchars($empleado['estadoFiniquito']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="21">No se encontraron datos.</td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>