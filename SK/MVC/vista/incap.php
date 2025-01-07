<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incapacidades</title>
</head>

<body>
    <div class="container">
        <h1><strong>Insertar Incapacidad</strong></h1>

        <section class="formulario">
            <form action="index.php?c=incapacidad&a=inicio" method="post" enctype="multipart/form-data">
                <div class="container">
                    Selecciona un tipo de ramo de seguro:
                    <select name="ramo">
                        <option value="1">Enfermedad en General</option>
                        <option value="2">Maternidad</option>
                        <option value="3">Riesgo de Trabajo</option>
                    </select>
                    <br>

                    Selecciona un tipo de riesgo:
                    <select name="riesgo">
                        <option value="1">Accidente de Trabajo</option>
                        <option value="2">Accidente de Trayecto</option>
                        <option value="3">Enfermedad Profesional</option>
                        <option value="4">Sin Riesgo</option>
                    </select>
                    <br>
                    Selecciona un tipo de incapacidad:
                    <select name="tipoincap">
                        <option value="1">Unico</option>
                        <option value="2">Inicial</option>
                        <option value="3">Subsecuente</option>
                        <option value="4">Alta Medica ST-2</option>
                        <option value="5">Prenatal</option>
                        <option value="6">Enlace</option>
                        <option value="7">Postnatal</option>
                    </select>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="diasAutorizadosInput" name="diasAutorizados"
                            placeholder="dias autorizados de incapacidad" required />
                        <label for="diasAutorizadosInput">Dias Autorizados</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaincapInput" name="fechaincap"
                            placeholder="fecha de incapacidad" required />
                        <label for="fechaincapInput">Fecha de Incapacidad</label>
                    </div>

                    <br>
                    Selecciona un estado de captura de la incapacidad:
                    <select name="estadocaptur">
                        <option value="1">Registrado</option>
                        <option value="2">Pendiente</option>
                    </select>
                    <br>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-personalizado">Confirmar</button>
                        <a href="index.php?c=menuincap" class="btn btn-personalizado">Cancelar</a>
                    </div>
                </div>
            </form>
        </section>
    </div>

</body>

</html>