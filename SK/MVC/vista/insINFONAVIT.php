<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/sk.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFONAVIT</title>
</head>

<body>

    <h1>Insertar INFONAVIT</h1>

    <section class="formulario">
        <form action="index.php?c=insertINFONAVIT&a=inicio" method="post" enctype="multipart/form-data">

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="numcredInput" name="numcred"
                    placeholder="numcred" required />
                <label for="numcredInput">Numero del Credito</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="valorcredInput" name="valorcred"
                    placeholder="valorcred" required />
                <label for="valorcredInput">Valor del Credito</label>
            </div>
            Selecciona un tipo de credito:
            <select name="tipocred">
                <option value="1">Porcentaje (%)</option>
                <option value="2">Cuota Fija (CF)</option>
                <option value="3">Veces Salario Mínimo (VSM)</option>
                <option value="4">Credito sin Identificar</option>
                <option value="5">Sin Credito</option>
            </select>

            <div class="btn-group">
                <button type="submit" class="btn btn-personalizado">Confirmar</button>
                <a href="index.php" class="btn btn-personalizado">Cancelar</a>
            </div>
        </form>
    </section>

</body>

</html>