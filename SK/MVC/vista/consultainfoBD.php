<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta BD</title>
</head>

<body>


    <section class="formulario">
        <form action="index.php?c=consultainfoBD&a=inicio" method="post" enctype="multipart/form-data">

            Selecciona un Estatus:
            <select name="estado">
                <option value="1">Alta</option>
                <option value="2">Baja</option>
            </select>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreEmpleadoInput" name="nomEmpleado"
                    placeholder="nomEmpleado" required />
                <label for="nombreEmpleadoInput">Nombre Empleado</label>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-personalizado">Confirmar</button>
                <a href="index.php" class="btn btn-personalizado">Cancelar</a>
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
                                <th>id_Empleado</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombre del Empleado</th>
                                <th>RFC</th>
                                <th>CURP</th>
                                <th>NSS</th>
                                <th>Correo</th>
                                <th>Genero</th>
                                <th>Codigo Postal</th>
                                <th>Sucursal</th>
                                <th>Razon Social</th>
                                <th>Fecha de Ingreso</th>
                                <th>Fecha de Alta IMSS</th>
                                <th>SDR</th>
                                <th>SDI</th>
                                <th>BV</th>
                                <th>Puesto</th>
                                <th>Descanso</th>
                                <th>Tipo de Pago</th>
                                <th>Registro Nomipaq</th>
                                <th>Numero de Credito</th>
                                <th>Valor del Credito</th>
                                <th>Tipo de Credito</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($resultado)): ?>
                                <?php foreach ($resultado as $empleado): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($empleado['id_empleado']) ?></td>
                                        <td><?= htmlspecialchars($empleado['apellidoPaterno']) ?></td>
                                        <td><?= htmlspecialchars($empleado['apellidoMaterno']) ?></td>
                                        <td><?= htmlspecialchars($empleado['nombreEmpleado']) ?></td>
                                        <td><?= htmlspecialchars($empleado['RFCEmpleado']) ?></td>
                                        <td><?= htmlspecialchars($empleado['CURPEmpleado']) ?></td>
                                        <td><?= htmlspecialchars($empleado['NSS']) ?></td>
                                        <td><?= htmlspecialchars($empleado['correoEmpleado']) ?></td>
                                        <td><?= htmlspecialchars($empleado['genero']) ?></td>
                                        <td><?= htmlspecialchars($empleado['numCodPostal']) ?></td>
                                        <td><?= htmlspecialchars($empleado['sucursales']) ?></td>
                                        <td><?= htmlspecialchars($empleado['razonSocial']) ?></td>
                                        <td><?= htmlspecialchars($empleado['fechaingreso']) ?></td>
                                        <td><?= htmlspecialchars($empleado['fechaAltaIMSS']) ?></td>
                                        <td><?= htmlspecialchars($empleado['SDR']) ?></td>
                                        <td><?= htmlspecialchars($empleado['SDI']) ?></td>
                                        <td><?= htmlspecialchars($empleado['bonoDiarioVariable']) ?></td>
                                        <td><?= htmlspecialchars($empleado['puesto']) ?></td>
                                        <td><?= htmlspecialchars($empleado['diaDescanso']) ?></td>
                                        <td><?= htmlspecialchars($empleado['tipoPago']) ?></td>
                                        <td><?= htmlspecialchars($empleado['codigoRegistroNomipaq']) ?></td>
                                        <td><?= htmlspecialchars($empleado['numCredito']) ?></td>
                                        <td><?= htmlspecialchars($empleado['valorCredito']) ?></td>
                                        <td><?= htmlspecialchars($empleado['tipoCredinfonavit']) ?></td>
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