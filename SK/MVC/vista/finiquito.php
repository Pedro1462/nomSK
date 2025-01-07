<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finiquito</title>
</head>

<body>

    <h1>Busqueda</h1>

    <section class="formulario">
        <form action="index.php?c=finiquito&a=inicio" method="post" enctype="multipart/form-data">

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

    <h1>Finiquito</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover" id="sampleTable1">
                        <tr>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombre del Empleado</th>
                            <th>Puesto</th>
                            <th>Salario Diario</th>
                            <th>Bono Variable</th>
                            <th>Sueldo Total</th>
                        </tr>

                        <?php if (!empty($resultado)): ?>
                            <?php foreach ($resultado as $empleado): ?>
                                <tr>
                                    <td><?= htmlspecialchars($empleado['apellidoPaterno']) ?></td>
                                    <td><?= htmlspecialchars($empleado['apellidoMaterno']) ?></td>
                                    <td><?= htmlspecialchars($empleado['nombreEmpleado']) ?></td>
                                    <td><?= htmlspecialchars($empleado['puesto']) ?></td>
                                    <td><?= htmlspecialchars($empleado['SDR']) ?></td>
                                    <td><?= htmlspecialchars($empleado['bonoDiarioVariable']) ?></td>
                                    <td><?= htmlspecialchars($empleado['SDR']) + htmlspecialchars($empleado['bonoDiarioVariable']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="21">No se encontraron datos.</td>
                            </tr>
                        <?php endif; ?>

                    </table>

                    <table class="table table-hover" id="sampleTable2">
                        <tr>
                            <th>Ejercicio</th>
                            <th>Sucursal</th>
                            <th>Razon Social</th>
                            <th>Fecha de Ingreso</th>
                            <th>RFC</th>
                            <th>NSS</th>

                        </tr>

                        <?php if (!empty($resultado)): ?>
                            <?php foreach ($resultado as $empleado): ?>
                                <tr>
                                    <td>01/01/2025</td>
                                    <td><?= htmlspecialchars($empleado['sucursales']) ?></td>
                                    <td><?= htmlspecialchars($empleado['razonSocial']) ?></td>
                                    <td><?= htmlspecialchars($empleado['fechaingreso']) ?></td>
                                    <td><?= htmlspecialchars($empleado['RFCEmpleado']) ?></td>
                                    <td><?= htmlspecialchars($empleado['NSS']) ?></td>

                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="21">No se encontraron datos.</td>
                            </tr>
                        <?php endif; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <h1>Calculos</h1>

    <section class="formulario">
        <form action="index.php?c=finiquito&a=procesar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="fechaingreso" value="<?= htmlspecialchars($empleado['fechaingreso']) ?>">
            <input type="hidden" name="salarioSDR" value="<?= htmlspecialchars($empleado['SDR']) ?>">
            <input type="hidden" name="bonoDV" value="<?= htmlspecialchars($empleado['bonoDiarioVariable']) ?>">

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fechaBajaInput" name="fechaBaja"
                    placeholder="fecha de Baja" required />
                <label for="fechaBajaInput">Fecha de Baja</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fechaVacacionesInput" name="fechaVacaciones"
                    placeholder="fecha de Vacaciones" required />
                <label for="fechaVacacionesInput">Fecha de Vacaciones Actual</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="diasPendientesPagoInput" name="diasPendientesPago"
                    placeholder="diasPendientesPago" required />
                <label for="diasPendientesPagoInput">Dias Pendientes de Pago</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="primaDomInput" name="primaDom"
                    placeholder="primaDom" required />
                <label for="primaDomInput">Prima Dominical Pendiente de Pago</label>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-personalizado">Calcular</button>
                <a href="index.php" class="btn btn-personalizado">Cancelar</a>
            </div>

            <p id="resultadoFechas"></p>
        </form>
    </section>

    <h1>Resultados</h1>

    <table class="table table-hover" id="sampleTable3">
        <h1>Percepciones</h1>
        <tr>
            <th>Días Laborados</th>
            <th>Factor Aguinaldo</th>
            <th>Total Aguinaldo</th>
        </tr>

        <?php if (isset($dias, $factorAguinaldo, $totalAguinaldo)): ?>
            <tr>
                <td><?= htmlspecialchars($dias) ?></td>
                <td><?= number_format($factorAguinaldo, 2) ?></td>
                <td><?= number_format($totalAguinaldo, 2) ?></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="3">No se han calculado resultados.</td>
            </tr>
        <?php endif; ?>
    </table>

    <table class="table table-hover" id="sampleTable4">
        <tr>
            <th>Días Laborados Vacaciones</th>
            <th>Factor Vacaciones</th>
            <th>Dias de Vacaciones</th>
            <th>Total Vacaciones</th>
            <th>Prima Vacacional</th>
            
        </tr>

        <?php if (isset($diasVac, $factorVacaciones, $diasVacionesLFT, $totalVacaciones, $primaVac)): ?>
            <tr>
                <td><?= htmlspecialchars($diasVac) ?></td>
                <td><?= number_format($factorVacaciones, 2) ?></td>
                <td><?= number_format($diasVacionesLFT, 2) ?></td>
                <td><?= number_format($totalVacaciones, 2) ?></td>
                <td><?= number_format($primaVac, 2) ?></td>
                
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="3">No se han calculado resultados.</td>
            </tr>
        <?php endif; ?>
    </table>

    <table class="table table-hover" id="sampleTable4">
        <tr>
            <th>Dias Pendientes de Pago</th>
            <th>Total de los dias Trabajados</th>
            <th>Prima Dominical</th>
            <th>Total Percepciones</th>
            
        </tr>

        <?php if (isset($diasPendporPagar, $primaDominical, $diasPendientesPago, $sumaPercerciones)): ?>
            <tr>
                <td><?= number_format($diasPendientesPago, 2) ?></td>
                <td><?= htmlspecialchars($diasPendporPagar) ?></td>
                <td><?= number_format($primaDominical, 2) ?></td>
                <td><?= number_format($sumaPercerciones, 2) ?></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="3">No se han calculado resultados.</td>
            </tr>
        <?php endif; ?>
    </table>


</body>

</html>