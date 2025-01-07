<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Control</title>
</head>

<body>

    <div class="container">
        <h1><strong>Insertar en Control de Empleados</strong></h1>
    </div>

    <section class="formulario">
        <form action="index.php?c=insControlEmpl&a=inicio" method="post" enctype="multipart/form-data" id="empleadoForm">

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fechaIngresoInput" name="fechaIngresoEmpleado"
                    placeholder="fecha de Ingreso" required />
                <label for="fechaIngresoInput">Fecha de ingreso</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fechaAltaIMSSInput" name="fechaAltaIMSS"
                    placeholder="fecha de Alta IMSS" required />
                <label for="fechaAltaIMSSInput">Fecha de alta IMSS</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaNombre" name="busquedaNombre"
                    placeholder="Buscar nombre de empleado" autocomplete="off" />
                <label for="busquedaNombre">Buscar Nombre</label>
                <div id="sugerenciasNombre" class="sugerencias-lista"></div>
                <input type="hidden" id="idEmpleado" name="idEmpleado" />
                <button type="button" id="buscarEmpleadoBtn" class="btn btn-secondary mt-2">Buscar Empleado</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaEmpresa" name="busquedaEmpresa"
                    placeholder="Buscar empresa para el empleado" autocomplete="off" />
                <label for="busquedaEmpresa">Buscar Empresa</label>
                <div id="sugerenciasEmpresa" class="sugerencias-lista"></div>
                <input type="hidden" id="idEmpresa" name="idEmpresa" />
                <button type="button" id="buscarEmpresaBtn" class="btn btn-secondary mt-2">Buscar Empresa</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaSucursal" name="busquedaSucursal"
                    placeholder="Buscar sucursal para el empleado" autocomplete="off" />
                <label for="busquedaSucursal">Buscar Sucursal</label>
                <div id="sugerenciasSucursal" class="sugerencias-lista"></div>
                <input type="hidden" id="idSucursal" name="idSucursal" />
                <button type="button" id="buscarSucursalBtn" class="btn btn-secondary mt-2">Buscar Sucursal</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaPuesto" name="busquedaPuesto"
                    placeholder="Buscar puesto para el empleado" autocomplete="off" />
                <label for="busquedaPuesto">Buscar Puesto</label>
                <div id="sugerenciasPuesto" class="sugerencias-lista"></div>
                <input type="hidden" id="idPuesto" name="idPuesto" />
                <button type="button" id="buscarPuestoBtn" class="btn btn-secondary mt-2">Buscar Puesto</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaGenero" name="busquedaGenero"
                    placeholder="Buscar genero para el empleado" autocomplete="off" />
                <label for="busquedaGenero">Buscar Genero</label>
                <div id="sugerenciasGenero" class="sugerencias-lista"></div>
                <input type="hidden" id="idGenero" name="idGenero" />
                <button type="button" id="buscarGeneroBtn" class="btn btn-secondary mt-2">Buscar Genero</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaDescanso" name="busquedaDescanso"
                    placeholder="Buscar descanso para el empleado" autocomplete="off" />
                <label for="busquedaDescanso">Buscar Descanso</label>
                <div id="sugerenciasDescanso" class="sugerencias-lista"></div>
                <input type="hidden" id="idDescanso" name="idDescanso" />
                <button type="button" id="buscarDescansoBtn" class="btn btn-secondary mt-2">Buscar Descanso</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaFormaPago" name="busquedaFormaPago"
                    placeholder="Buscar forma de pago para el empleado" autocomplete="off" />
                <label for="busquedaFormaPago">Buscar Forma de Pago</label>
                <div id="sugerenciasFormaPago" class="sugerencias-lista"></div>
                <input type="hidden" id="idFormaPago" name="idFormaPago" />
                <button type="button" id="buscarFormaPagoBtn" class="btn btn-secondary mt-2">Buscar Forma de Pago</button>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="busquedaCP" name="busquedaCP"
                    placeholder="Buscar codigo postal para el empleado" autocomplete="off" />
                <label for="busquedaCP">Buscar Codigo Postal</label>
                <div id="sugerenciasCP" class="sugerencias-lista"></div>
                <input type="hidden" id="idCP" name="idCP" />
                <button type="button" id="buscarCPBtn" class="btn btn-secondary mt-2">Buscar Codigo Postal</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaSDR" name="busquedaSDR"
                    placeholder="Buscar SDR para el empleado" autocomplete="off" />
                <label for="busquedaSDR">Buscar Salario Diario Real</label>
                <div id="sugerenciasSDR" class="sugerencias-lista"></div>
                <input type="hidden" id="idSDR" name="idSDR" />
                <button type="button" id="buscarSDRBtn" class="btn btn-secondary mt-2">Buscar Salario Diario Real</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaSDI" name="busquedaSDI"
                    placeholder="Buscar SDI para el empleado" autocomplete="off" />
                <label for="busquedaSDI">Buscar Salario Diario Integrado</label>
                <div id="sugerenciasSDI" class="sugerencias-lista"></div>
                <input type="hidden" id="idSDI" name="idSDI" />
                <button type="button" id="buscarSDIBtn" class="btn btn-secondary mt-2">Buscar Salario Diario Integrado</button>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="busquedaBV" name="busquedaBV"
                    placeholder="Buscar BV para el empleado" autocomplete="off" />
                <label for="busquedaBV">Buscar Bono Variable</label>
                <div id="sugerenciasBV" class="sugerencias-lista"></div>
                <input type="hidden" id="idBV" name="idBV" />
                <button type="button" id="buscarBVBtn" class="btn btn-secondary mt-2">Buscar Bono Variable</button>
            </div>


            <div class="btn-group">
                <button type="submit" class="btn btn-personalizado">Confirmar</button>
                <a href="index.php" class="btn btn-personalizado">Cancelar</a>
            </div>

        </form>

    </section>

    <script src="../../script/scriptConsultaNombre.js"></script>
    <script src="../../script/scriptConsultaEmpresa.js"></script>
    <script src="../../script/scriptConsultaSucursal.js "></script>
    <script src="../../script/scriptConsultaPuesto.js "></script>
    <script src="../../script/scriptConsultaGenero.js "></script>
    <script src="../../script/scriptConsultaDescanso.js "></script>
    <script src="../../script/scriptConsultaFormaPago.js "></script>
    <script src="../../script/scriptConsultaCP.js "></script>
    <script src="../../script/scriptConsultaSDR.js "></script>
    <script src="../../script/scriptConsultaSDI.js "></script>
    <script src="../../script/scriptConsultaBV.js "></script>

</body>

</html>