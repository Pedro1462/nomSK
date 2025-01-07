<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Empleado</title>
</head>

<body>

    <div class="container">
        <h1><strong>Insertar Empleado</strong></h1>

        <section class="formulario">

            <form action="index.php?c=insEmpleado&a=inicio" method="post" enctype="multipart/form-data">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombreEmpleadoInput" name="nomEmpleado"
                        placeholder="nomEmpleado" required />
                    <label for="nombreEmpleadoInput">Nombre Empleado</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellidoPaternoInput" name="apellidoPaterno"
                        placeholder="apellidoPaterno" required />
                    <label for="apellidoPaternoInput">Apellido Paterno</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellidoMaternoInput" name="apellidoMaterno"
                        placeholder="apellidoMaterno" required />
                    <label for="apellidoMaternoInput">Apellido Materno</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="RFCInput" name="RFC" minlength="13" maxlength="13"
                        placeholder="RFC" required />
                    <label for="RFCInput">RFC</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="CURPInput" name="CURP" minlength="18" maxlength="18"
                        placeholder="CURP" required />
                    <label for="CURPInput">CURP</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="NSSInput" name="NSS" minlength="11" maxlength="11"
                        placeholder="NSS" required />
                    <label for="NSSInput">NSS</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="correoInput" name="correo"
                        placeholder="correo" required />
                    <label for="correoInput">Correo</label>
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