<?php
require_once "modelo/consultasBD.php";

class inicioControlador
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {
        require_once "vista/principal.php";
    }
}

class inicioControladorEmpleado
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomEmpleado = strtoupper($_POST['nomEmpleado'] ?? null);
            $apellidoPaterno = strtoupper($_POST['apellidoPaterno'] ?? null);
            $apellidoMaterno = strtoupper($_POST['apellidoMaterno'] ?? null);
            $RFC = strtoupper($_POST['RFC'] ?? null);
            $CURP = strtoupper($_POST['CURP'] ?? null);
            $NSS = $_POST['NSS'] ?? null;
            $correo = strtolower(trim($_POST['correo'] ?? null));

            if (strlen($RFC) !== 13) {
                die("El RFC debe tener exactamente 13 caracteres.");
            }

            if (strlen($CURP) !== 18) {
                die("El RFC debe tener exactamente 18 caracteres.");
            }

            if (strlen($NSS) !== 11) {
                die("El RFC debe tener exactamente 11 caracteres.");
            }

            if ($this->modelo->insertarEmpleado($nomEmpleado, $apellidoPaterno, $apellidoMaterno, $RFC, $CURP, $NSS, $correo)) {
                echo "<script>
                    alert('Registro exitoso');
                    window.location.href = 'index.php?c=insEmpleado';
                </script>";
                return;
            } else {
                echo "<script>alert('Error al insertar la informacion');</script>";
            }
        }

        require_once "vista/insertarEmpleado.php";
    }
}

class inicioControladorControlEmpleados
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {

        if (isset($_GET['q']) && isset($_GET['type'])) {
            $query = strtoupper($_GET['q']);
            $type = $_GET['type'];

            switch ($type) {
                case 'empleado':
                    $resultados = $this->modelo->consultaNombreEmpleado($query);
                break;

                case 'empresa':
                    $resultados = $this->modelo->consultaNombreEmpresa($query);
                break;

                case 'sucursal':
                    $resultados = $this->modelo->consultaNombreSucursal($query);
                break;

                case 'puesto':
                    $resultados = $this->modelo->consultaNombrePuesto($query);
                break;

                case 'genero':
                    $resultados = $this->modelo->consultaNombreGenero($query);
                break;

                case 'descanso':
                    $resultados = $this->modelo->consultaNombreDescanso($query);
                break;

                case 'formaPago':
                    $resultados = $this->modelo->consultaFormadePago($query);
                break;

                case 'codigoP':
                    $resultados = $this->modelo->consultaCodigoPostal($query);
                break;

                case 'consultaSDR':
                    $resultados = $this->modelo->consultaSDR($query);
                break;

                case 'consultaSDI':
                    $resultados = $this->modelo->consultaSDI($query);
                break;

                case 'bonoVar':
                    $resultados = $this->modelo->consultaBonoVariable($query);
                break;
                
            }

            // Devolver resultados como JSON
            header('Content-Type: application/json');
            echo json_encode($resultados);
            return;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fechaIngreso = $_POST['fechaIngresoEmpleado'];
            $fechaAltaIMSS = $_POST['fechaAltaIMSS'];
            $idEmpleado = $_POST['idEmpleado'];
            $idEmpresa = $_POST['idEmpresa'];
            $idSucursal = $_POST['idSucursal'];
            $idPuesto = $_POST['idPuesto'];
            $idGenero = $_POST['idGenero'];
            $idDescanso = $_POST['idDescanso'];
            $idFormaPago = $_POST['idFormaPago'];
            $idCodigoP = $_POST['idCP'];
            $idSDR = $_POST['idSDR'];
            $idSDI = $_POST['idSDI'];
            $idBV = $_POST['idBV'];

            if ($this->modelo->insertarControlEmpleado(
            $fechaIngreso,
            $fechaAltaIMSS,
            $idEmpleado,
            $idEmpresa,
            $idSucursal,
            $idPuesto,
            $idGenero,
            $idDescanso,
            $idFormaPago,
            $idCodigoP,
            $idSDR,
            $idSDI,
            $idBV
            )) {
                echo "<script>
                    alert('Registro exitoso');
                    window.location.href = 'index.php?c=insControlEmpl';
                </script>";
                return;
            } else {
                echo "<script>alert('Error al insertar la informacion');</script>";
            }

        }

        require_once "vista/insControlEmpl.php";
    }
}

class inicioControladorCodigoP
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigoP = $_POST['codigoP'];

            if ($this->modelo->insertarCodigoP($codigoP)) {
                echo "<script>
                    alert('Registro exitoso');
                    window.location.href = 'index.php?c=insCodigoP';
                </script>";
                return;
            } else {
                echo "<script>alert('Error al insertar la informacion');</script>";
            }
        }

        require_once "vista/insCP.php";
    }
}

class inicioControladorConsultaInfoBD
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    { 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
        $estado = $_POST['estado'];
        $nombre = strtoupper($_POST['nomEmpleado'] ?? null);

        $resultado=$this->modelo->consultainfoBD($estado, $nombre);

          }
        require_once "vista/consultainfoBD.php";
    }
}

class inicioControladorMenuIncap
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {
        
        require_once "vista/menuincap.php";
    }
}

class inicioControladorIncapacidad
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tiporamoseguro = $_POST['ramo'];
            $tiporiesgo = $_POST['riesgo'];
            $tipoincapacidad = $_POST['tipoincap'];
            $diasAutorizados = $_POST['diasAutorizados'];
            $fechaincap = $_POST['fechaincap'];
            $estadoincap = $_POST['estadocaptur'];

            if ($this->modelo->insertarIncapacidad($tiporamoseguro, $tiporiesgo, $tipoincapacidad, $diasAutorizados, $fechaincap, $estadoincap)) {
                echo "<script>
                    alert('Registro exitoso');
                    window.location.href = 'index.php?c=incapacidad';
                </script>";
                return;
            } else {
                echo "<script>alert('Error al insertar la informacion');</script>";
            }
        }

        require_once "vista/incap.php";
    }
}

class inicioControladorVinculoIncapacidad
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $empleado = $_POST['idEmpleado'];
            $serie = $_POST['serie'];
            $ramoseguro = $_POST['ramoseguro'];

            if ($this->modelo->vincularIncapacidad($empleado, $serie, $ramoseguro)) {
                echo "<script>
                    alert('Registro exitoso');
                    window.location.href = 'index.php?c=vinculoincapacidad';
                </script>";
                return;
            } else {
                echo "<script>alert('Error al insertar la informacion');</script>";
            }
        }

        require_once "vista/vinculoincap.php";
    }
}

class inicioControladorConsultaIncapacidad
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {

        $resultado=$this->modelo->consultaincap();

        require_once "vista/consultaincap.php";
    }
}

class inicioControladorRegistrosIncapacidad
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {

        $resultado=$this->modelo->consultaregistrosincap();

        require_once "vista/consultaregincap.php";
    }
}

class inicioControladorBajas
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {
        if (isset($_GET['q']) && isset($_GET['type'])) {
            $query = strtoupper($_GET['q']);
            $type = $_GET['type'];

            switch ($type) {
                case 'empleado':
                    $resultados = $this->modelo->consultaNombreEmpleadodesdeAltas($query);
                break;
            }

            // Devolver resultados como JSON
            header('Content-Type: application/json');
            echo json_encode($resultados);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fechaBaja = $_POST['fechabaja'];
            $estadoCorreo = $_POST['correo'];
            $estadoFiniquito = $_POST['edofiniquito'];
            $alta = $_POST['idEmpleadoAlta'];

            if ($this->modelo->insertarBaja(
            $fechaBaja,
            $estadoCorreo,
            $estadoFiniquito,
            $alta
            )) {
                echo "<script>
                    alert('Registro exitoso');
                    window.location.href = 'index.php?c=bajas';
                </script>";
                return;
            } else {
                echo "<script>alert('Error al insertar la informacion');</script>";
            }

        }
        
        require_once "vista/bajas.php";
    }
}

class inicioControladorMenuBajas
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {        
        require_once "vista/menubajas.php";
    }
}

class inicioControladorConsultaBajas
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {        
        $resultado=$this->modelo->consultabajas();
        require_once "vista/consultabajas.php";
    }
}

class inicioControladorConsultaBajasporNomb
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {     if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
        $nombre = strtoupper($_POST['nomEmpleado'] ?? null);

        $resultado=$this->modelo->consultabajaspornombre($nombre);

          }
        require_once "vista/consultabajaspornombre.php";
    }
}

class inicioControladorInsertINFONAVIT
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {     if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
        $numcred = strtoupper($_POST['numcred'] ?? null);
        $valorcred = strtoupper($_POST['valorcred'] ?? null);
        $tipocred = strtoupper($_POST['tipocred'] ?? null);


        if ($this->modelo->insertarcreditoinfon($numcred, $valorcred, $tipocred)) {
            echo "<script>
                alert('Registro exitoso');
                window.location.href = 'index.php?c=insertINFONAVIT';
            </script>";
            return;
        } else {
            echo "<script>alert('Error al insertar la informacion');</script>";
        }

        }
        require_once "vista/insINFONAVIT.php";
    }
}

class inicioControladorFiniquito
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
        $estado = $_POST['estado'];
        $nombre = strtoupper($_POST['nomEmpleado'] ?? null);

        $resultado=$this->modelo->consultainfoBD($estado, $nombre);
          }
        require_once "vista/finiquito.php";
    }

    

    public function procesar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //var_dump($_POST); //es para ver que se esta enviando
            //var_dump($_POST); die;
            $primerDAnio="01/01/2025";
            $diasAnioAguinaldo = 365;
            $diasAguinaldo = 15;
            $primerDAnioObj = new DateTime($primerDAnio);
            $diasPendientesPago = $_POST['diasPendientesPago'];
            $primaDom = $_POST['primaDom'];
            $fechaIngreso = $_POST['fechaingreso'];
            $salarioSDR = $_POST['salarioSDR'];
            $bonoDV = $_POST['bonoDV'];
            $fechaBaja = $_POST['fechaBaja'];
            $fechaVacaciones = $_POST['fechaVacaciones'];
            

            // Validar que las fechas
            if (!empty($fechaIngreso) && !empty($fechaBaja)) {
                try {
                    $fechaIngresoObj = new DateTime($fechaIngreso);
                    $fechaBajaObj = new DateTime($fechaBaja);
                    $fechaVacacionesObj = new DateTime($fechaVacaciones);
    
                    // Calcular la diferencia y obtener los dias
                    $diferencia = $fechaIngresoObj->diff($fechaBajaObj);
                    $dias = $diferencia->days+1;


                    //Calcular Aguinaldo
                    $diferencia = $primerDAnioObj->diff($fechaBajaObj);
                    $diasDiferencia = $diferencia->days+1;
                    $sueldoTotal=$salarioSDR+$bonoDV;
                    $factorAguinaldo = ($diasDiferencia * $diasAguinaldo) / $diasAnioAguinaldo;
                    $totalAguinaldo = $factorAguinaldo * $sueldoTotal;

                    //Calcular Vacaciones
                    $difVacaciones = $fechaVacacionesObj -> diff($fechaBajaObj);
                    $diasVac = $difVacaciones-> days+1;
                    $aniosLab= ceil($dias/365.25);
                    $diasVacionesLFT =calcularVacaciones($aniosLab);
                    $factorVacaciones =($diasVac*$diasVacionesLFT)/$diasAnioAguinaldo;
                    $totalVacaciones = $factorVacaciones * $sueldoTotal;
                    $primaVac = $totalVacaciones * 0.25;
                  

                    //Dias pendientes de Pago
                    $diasPendporPagar = $diasPendientesPago * $sueldoTotal;
                    $primaDominical = ($sueldoTotal * 0.25) * $primaDom;


                    //Total Percepciones
                    $sumaPercerciones = $totalAguinaldo + $totalVacaciones + $primaVac+ $diasPendporPagar + $primaDominical;
                    

                } catch (Exception $e) {
                    $mensaje = "Error al calcular: " . $e->getMessage();
                }
            }    
           
            require_once "vista/finiquito.php";
        }
    }
    
}

function calcularVacaciones($anio) {
    if ($anio == 1) {
        return 12; // Primer año: 12 días
    } elseif ($anio <= 5) {
        return 12 + (($anio - 1) * 2); // Del segundo al quinto año: 2 días más por año
    } elseif ($anio == 6) {
        return 22; // Sexto año: 22 días
    } elseif ($anio >= 7 && $anio <= 10) {
        return 22; // Del séptimo al décimo año: 22 días
    } else {
        return "Año fuera del rango"; // Para años no considerados en las reglas
    }
}

class inicioControladorVacaciones
{

    private $modelo;

    public function __construct()
    {
        // Crear un objeto de "consultaEmpleados" para visualizar empleados
        $this->modelo = new consultaEmpleados(baseDatos::conectarBD());
    }

    public function inicio()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
        $estado = $_POST['estado'];
        $nombre = strtoupper($_POST['nomEmpleado'] ?? null);
        $fechaBaja = $_POST['fechaBaja'];
        $fechaVacaciones=$_POST['fechaVacaciones'];

        $resultado=$this->modelo->consultainfoBD($estado, $nombre);

        if ($fechaBaja){
            echo "Algo paso";//
        } else {
            echo "paso otra cosa";
        }
          }
        require_once "vista/finiquito.php";
    }
}