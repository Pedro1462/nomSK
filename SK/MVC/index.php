<?php

$controlador = isset($_GET['c']) ? $_GET['c'] : 'inicio';
$accion = isset($_GET['a']) ? $_GET['a'] : 'inicio';

require_once "controlador/inicio.controlador.php";
require_once __DIR__ . '/../vendor/autoload.php';


switch ($controlador) {
    case 'inicio':
        $controladorObjeto = new inicioControlador();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'insEmpleado':
        $controladorObjeto = new inicioControladorEmpleado();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'insControlEmpl':
        $controladorObjeto = new inicioControladorControlEmpleados();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'insCodigoP':
        $controladorObjeto = new inicioControladorCodigoP();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'consultainfoBD':
        $controladorObjeto = new inicioControladorConsultaInfoBD();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'menuincap':
        $controladorObjeto = new inicioControladorMenuIncap();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'incapacidad':
        $controladorObjeto = new inicioControladorIncapacidad();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'vinculoincapacidad':
        $controladorObjeto = new inicioControladorVinculoIncapacidad();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'consultaincap':
        $controladorObjeto = new inicioControladorConsultaIncapacidad();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'registrosincap':
        $controladorObjeto = new inicioControladorRegistrosIncapacidad();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'bajas':
        $controladorObjeto = new inicioControladorBajas();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'menubajas':
        $controladorObjeto = new inicioControladorMenuBajas();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'consultabajas':
        $controladorObjeto = new inicioControladorConsultaBajas();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'consultabajaspornombre':
        $controladorObjeto = new inicioControladorConsultaBajasporNomb();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'insertINFONAVIT':
        $controladorObjeto = new inicioControladorInsertINFONAVIT();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'finiquito':
        $controladorObjeto = new inicioControladorFiniquito();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'vacaciones':
        $controladorObjeto = new inicioControladorVacaciones();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'menuVacaciones':
        $controladorObjeto = new inicioControladormenuVacaciones();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'consultaVacaciones':
        $controladorObjeto = new inicioControladorConsultaVacaciones();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'solicitudesModificacion':
        $controladorObjeto = new inicioControladorSolicModif();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'modificacionesdeTablaEmpleados':
        $controladorObjeto = new inicioControladorModifTablaEmpleados();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'menudelasactualizaciones':
        $controladorObjeto = new inicioControladorMenuActualizaciones();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;

    case 'modificacionesdeTablaBaja':
        $controladorObjeto = new inicioControladorModifTablaBaja();
        ejecutarAccion($controladorObjeto, $accion, $_POST);
        break;
}




function ejecutarAccion($controladorObjeto, $accion, $parametros = [])
{
    if (method_exists($controladorObjeto, $accion)) {
        call_user_func(array($controladorObjeto, $accion), $parametros);
    } else {
        echo "La acción '$accion' no existe en el controlador.";
    }
}
