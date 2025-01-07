<?php

require_once "conexion.php";

class consultaEmpleados
{

    private $empleadosConexion;

    public function __construct($conexion)
    {
        $this->empleadosConexion = $conexion;
    }

    public function insertarEmpleado($nombreEmpleado, $apellidoPaterno, $apellidoMaterno, $RFC, $CURP, $NSS, $correo)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "INSERT INTO  empleado (nombreEmpleado,apellidoPaterno,apellidoMaterno,RFCEmpleado,CURPEmpleado,NSS,correoEmpleado)
     VALUES (:nombreEmpleado, :apellidoPaterno, :apellidoMaterno, :RFCEmpleado, :CURPEmpleado, :NSS, :correoEmpleado)";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación del Insert.");
        }

        try {

            $result = $stmt->execute([
                ':nombreEmpleado' => $nombreEmpleado,
                ':apellidoPaterno' => $apellidoPaterno,
                ':apellidoMaterno' => $apellidoMaterno,
                ':RFCEmpleado' => $RFC,
                ':CURPEmpleado' => $CURP,
                ':NSS' => $NSS,
                ':correoEmpleado' => $correo
            ]);

            return $result;
        } catch (PDOException $e) {
            echo "Error al Insertar: " . $e->getMessage();
            return false;
        }

        if (!$result) {
            print_r($stmt->errorInfo());
            die("Error al Insertar.");
            return false;
        }
    }

    public function insertarcreditoinfon($numcred, $valorcred, $tipocred)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "
        insert into infonavit(numCredito,valorCredito,id_tipoCredinfonavit)
        VALUES (:numcred, :valorcred, :tipocred)
        ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación del Insert.");
        }

        try {

            $result = $stmt->execute([
                ':numcred' => $numcred,
                ':valorcred' => $valorcred,
                ':tipocred' => $tipocred
            ]);

            return $result;
        } catch (PDOException $e) {
            echo "Error al Insertar: " . $e->getMessage();
            return false;
        }

        if (!$result) {
            print_r($stmt->errorInfo());
            die("Error al Insertar.");
            return false;
        }
    }

    public function insertarCodigoP($codigoP)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "INSERT INTO  codigopostal (numCodPostal) VALUES (:codigoP)";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación del Insert.");
        }

        try {

            $result = $stmt->execute([
                ':codigoP' => $codigoP
            ]);

            return $result;
        } catch (PDOException $e) {
            echo "Error al Insertar: " . $e->getMessage();
            return false;
        }

        if (!$result) {
            print_r($stmt->errorInfo());
            die("Error al Insertar.");
            return false;
        }
    }

    public function insertarControlEmpleado($fechaingreso,$fechaAltaIMSS,$id_empleado,$id_empresas,$id_sucursal,$id_puesto,
    $id_genero,$id_descanso,/*$id_estatus,*/$id_formaPago,$id_codigoP,$id_salarioDiarioReal,$id_salarioDiariointegrado,
    $id_bonoVariable,/*$id_bonoCubreGerente, $id_infonavit,$codigoRegistroNomipaq,$codigoRegistroBanco*/)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "INSERT INTO altas (fechaingreso,fechaAltaIMSS,id_empleado,id_empresas,id_sucursal,id_puesto,
        id_genero,id_descanso,id_estatus,id_formaPago,id_codigoP,id_salarioDiarioReal,id_salarioDiariointegrado,
        id_bonoVariable,id_bonoCubreGerente, id_infonavit,codigoRegistroNomipaq,codigoRegistroBanco)
        VALUES (:fechaingreso,:fechaAltaIMSS,:id_empleado,:id_empresas,:id_sucursal,:id_puesto,
        :id_genero,:id_descanso,:id_estatus,:id_formaPago,:id_codigoP,:id_salarioDiarioReal,:id_salarioDiariointegrado,
        :id_bonoVariable,:id_bonoCubreGerente,:id_infonavit,:codigoRegistroNomipaq,:codigoRegistroBanco)";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación del Insert.");
        }

        try {

            $result = $stmt->execute([
                ':fechaingreso' => $fechaingreso,
                ':fechaAltaIMSS' => $fechaAltaIMSS,
                ':id_empleado' => $id_empleado,
                ':id_empresas'=> $id_empresas,
                ':id_sucursal'=> $id_sucursal,
                ':id_puesto' => $id_puesto,
                ':id_genero'=> $id_genero,
                ':id_descanso'=> $id_descanso,
                ':id_estatus'=> /*$id_estatus*/ "1",
                ':id_formaPago'=> $id_formaPago,
                ':id_codigoP' => $id_codigoP,
                ':id_salarioDiarioReal'=> $id_salarioDiarioReal,
                ':id_salarioDiariointegrado' => $id_salarioDiariointegrado,
                ':id_bonoVariable' => $id_bonoVariable,
                ':id_bonoCubreGerente' => /*$id_bonoCubreGerente*/ "3",
                ':id_infonavit' => /*$id_infonavit*/ "47",
                ':codigoRegistroNomipaq' => /*$codigoRegistroNomipaq*/ "NULL",
                ':codigoRegistroBanco' => /*$codigoRegistroBanco*/ "NULL"
            ]);

            return $result;
        } catch (PDOException $e) {
            echo "Error al Insertar: " . $e->getMessage();
            return false;
        }

        if (!$result) {
            print_r($stmt->errorInfo());
            die("Error al Insertar.");
            return false;
        }
    }

    public function insertarIncapacidad($tiporamoseguro, $tiporiesgo, $tipoincapacidad, $diasAutorizados, $fechaincap, $estadoincap)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "INSERT INTO  ramoseguro (id_tipoRamoSeg,id_tiporiesgo ,id_tipoincapacidad, diasAutorizados,periodoinicial, id_estadoincapacidad)
     VALUES (:tiporamoseguro, :tiporiesgo, :tipoincapacidad, :diasAutorizados, :fechaincap, :estadoincapacidad)";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación del Insert.");
        }

        try {

            $result = $stmt->execute([
                ':tiporamoseguro' => $tiporamoseguro,
                ':tiporiesgo' => $tiporiesgo,
                ':tipoincapacidad' => $tipoincapacidad,
                ':diasAutorizados' => $diasAutorizados,
                ':fechaincap' => $fechaincap,
                ':estadoincapacidad' => $estadoincap
            ]);

            return $result;
        } catch (PDOException $e) {
            echo "Error al Insertar: " . $e->getMessage();
            return false;
        }

        if (!$result) {
            print_r($stmt->errorInfo());
            die("Error al Insertar.");
            return false;
        }
    }

    public function insertarBaja($fechaBaja, $estadoCorreo, $estadoFiniquito, $alta)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "
        insert into bajas (fechaBaja,id_estCorreo,id_estFiniquito,id_alta)
     VALUES (:fechaBaja, :estadoCorreo, :estadoFiniquito, :alta)
        ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación del Insert.");
        }

        try {

            $result = $stmt->execute([
                ':fechaBaja' => $fechaBaja,
                ':estadoCorreo' => $estadoCorreo,
                ':estadoFiniquito' => $estadoFiniquito,
                ':alta' => $alta
            ]);

            return $result;
        } catch (PDOException $e) {
            echo "Error al Insertar: " . $e->getMessage();
            return false;
        }

        if (!$result) {
            print_r($stmt->errorInfo());
            die("Error al Insertar.");
            return false;
        }
    }

    public function vincularIncapacidad($empleado, $serie, $ramoseguro)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "INSERT INTO  incapacidades (id_empleado,serieFolio ,id_ramoSeguro)
     VALUES (:empleado, :serie, :ramoseguro)";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación del Insert.");
        }

        try {

            $result = $stmt->execute([
                ':empleado' => $empleado,
                ':serie' => $serie,
                ':ramoseguro' => $ramoseguro
            ]);

            return $result;
        } catch (PDOException $e) {
            echo "Error al Insertar: " . $e->getMessage();
            return false;
        }

        if (!$result) {
            print_r($stmt->errorInfo());
            die("Error al Insertar.");
            return false;
        }
    }

    public function consultaNombreEmpleado($nombreEmpleado)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_empleado, nombreEmpleado, apellidoPaterno, apellidoMaterno FROM empleado WHERE nombreEmpleado LIKE :nombreEmpleado ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':nombreEmpleado' => "%$nombreEmpleado%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaNombreEmpleadodesdeAltas($nombreEmpleado)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "
        select a.id_alta, e.apellidoPaterno , e.apellidoMaterno , e.nombreEmpleado 
        from empleado e 
        left join altas a on a.id_empleado = e.id_empleado 
        where e.nombreEmpleado LIKE :nombreEmpleado 
        ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':nombreEmpleado' => "%$nombreEmpleado%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaNombreEmpresa($nombreEmpresa)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_empresas, razonSocial FROM empresas WHERE razonSocial LIKE :nombreEmpresa ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':nombreEmpresa' => "%$nombreEmpresa%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaNombreSucursal($nombreSucursal)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_sucursal, sucursales FROM sucursales WHERE sucursales LIKE :nombreSucursal ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':nombreSucursal' => "%$nombreSucursal%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaNombrePuesto($nombrePuesto)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_puesto, puesto FROM puestos WHERE puesto LIKE :nombrePuesto ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':nombrePuesto' => "%$nombrePuesto%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaNombreGenero($genero)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_genero, genero FROM genero WHERE genero LIKE :genero ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':genero' => "%$genero%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaNombreDescanso($descanso)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_descanso, diaDescanso FROM descansos WHERE diaDescanso LIKE :descanso ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':descanso' => "%$descanso%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaFormadePago($fpago)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_formaPago, tipoPago FROM formaPago WHERE tipoPago LIKE :formadePago ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':formadePago' => "%$fpago%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaCodigoPostal($codigoP)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_codigoP, numCodPostal FROM codigopostal WHERE numCodPostal LIKE :codigo ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':codigo' => "%$codigoP%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaSDR($sdr)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_salarioDiarioreal, SDR FROM salariodiarioreal WHERE SDR LIKE :sdr ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':sdr' => "%$sdr%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaSDI($sdi)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_salarioDiariointegrado, SDI FROM salariodiariointegrado WHERE SDI LIKE :sdi ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':sdi' => "%$sdi%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultaBonoVariable($bv)
    {

        if (!$this->empleadosConexion) {
            die("Error: No se pudo establecer la conexión a la base de datos.");
        }

        $query = "SELECT id_bonoVariable, bonoDiarioVariable FROM bonovariable WHERE bonoDiarioVariable LIKE :bonovar ";

        $stmt = $this->empleadosConexion->prepare($query);

        if (!$stmt) {
            die("Error en la preparación de la consulta.");
        }

        try {

            $result = $stmt->execute([
                ':bonovar' => "%$bv%"
            ]);

            //$resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver como array asociativo

            return $resultados;

        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function consultainfoBD($estado,$nombre)
    {
        if (!$this->empleadosConexion) {
            throw new RuntimeException("Error: No se pudo establecer la conexión a la base de datos.");
        }
    
        $query = "
            SELECT 
                a.id_empleado, e.apellidoPaterno, e.apellidoMaterno, e.nombreEmpleado, 
                e.RFCEmpleado, e.CURPEmpleado, e.NSS, e.correoEmpleado, g.genero, 
                c.numCodPostal, s.sucursales, e2.razonSocial, a.fechaingreso, 
                a.fechaAltaIMSS, s2.SDR, s3.SDI, b2.bonoDiarioVariable, p.puesto, 
                d.diaDescanso, f.tipoPago, a.codigoRegistroNomipaq, i.numCredito,i.valorCredito, t.tipoCredinfonavit 
            FROM 
                altas a 
            LEFT JOIN empleado e ON a.id_empleado = e.id_empleado
            LEFT JOIN genero g ON a.id_genero = g.id_genero
            LEFT JOIN sucursales s ON a.id_sucursal = s.id_sucursal
            LEFT JOIN salariodiarioreal s2 ON a.id_salarioDiarioReal = s2.id_salarioDiarioreal
            LEFT JOIN bonovariable b2 ON a.id_bonoVariable = b2.id_bonoVariable
            LEFT JOIN empresas e2 ON a.id_empresas = e2.id_empresas
            LEFT JOIN puestos p ON a.id_puesto = p.id_puesto
            LEFT JOIN descansos d ON a.id_descanso = d.id_descanso
            LEFT JOIN salariodiariointegrado s3 ON a.id_salarioDiariointegrado = s3.id_salarioDiariointegrado
            LEFT JOIN formapago f ON a.id_formaPago = f.id_formaPago
            LEFT JOIN codigopostal c ON a.id_codigoP = c.id_codigoP
            left join infonavit i on a.id_infonavit =i.id_infonavit 
            left join tipocredinfonavit t on i.id_tipoCredinfonavit =t.id_tipoCredinfonavit 
            WHERE a.id_estatus = :estado AND e.nombreEmpleado LIKE :nombre
        ";
    
        $stmt = $this->empleadosConexion->prepare($query);
    
        if (!$stmt) {
            throw new RuntimeException("Error en la preparación de la consulta.");
        }
    
        try {

            $result = $stmt->execute([
                ':estado' => $estado,
                ':nombre' => "%$nombre%"
            ]);
    
            // Devuelve todos los resultados como un array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            // Manejamos el error registrándolo o informándolo
            error_log("Error en la consulta: " . $e->getMessage());
            return [];
        }
    }    

    public function consultaincap()
    {
        if (!$this->empleadosConexion) {
            throw new RuntimeException("Error: No se pudo establecer la conexión a la base de datos.");
        }
    
        $query = "
            select i.id_incapacidad, e.apellidoPaterno , e.apellidoMaterno , e.nombreEmpleado , i.serieFolio, t.tipoRamo, t2.tipoRTrabajo, t3.tipoincap,r.diasAutorizados, r.periodoinicial, e2.registroincap 
            from incapacidades i 
            left join empleado e on i.id_empleado = e.id_empleado 
            left join ramoseguro r on i.id_ramoSeguro = r.id_ramoSeguro
            left join tiporamoseguro t on t.id_tipoRamoseg = r.id_tipoRamoSeg
            left join tiporiesgo t2 on t2.id_tipoRiesgo = r.id_tipoRiesgo 
            left join tipoincapacidad t3 on t3.id_tipoincapacidad = r.id_tipoincapacidad
            left  join estadoincapacidad e2 on e2.id_estadoincapacidad = r.id_estadoincapacidad
        ";
    
        $stmt = $this->empleadosConexion->prepare($query);
    
        if (!$stmt) {
            throw new RuntimeException("Error en la preparación de la consulta.");
        }
    
        try {

            $result = $stmt->execute();
    
            // Devuelve todos los resultados como un array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            // Manejamos el error registrándolo o informándolo
            error_log("Error en la consulta: " . $e->getMessage());
            return [];
        }
    }

    public function consultaregistrosincap()
    {
        if (!$this->empleadosConexion) {
            throw new RuntimeException("Error: No se pudo establecer la conexión a la base de datos.");
        }
    
        $query = "
            select r.id_ramoSeguro, t.tipoRamo , t2.tipoRTrabajo, t3.tipoincap , r.diasAutorizados , r.periodoinicial, e.registroincap 
            from ramoseguro r 
            left join tiporamoseguro t on r.id_tipoRamoSeg = t.id_tipoRamoseg 
            left join tiporiesgo t2 on r.id_tipoRiesgo = t2.id_tipoRiesgo 
            left join tipoincapacidad t3 on r.id_tipoincapacidad = t3.id_tipoincapacidad 
            left join estadoincapacidad e on r.id_estadoincapacidad = e.id_estadoincapacidad
        ";
    
        $stmt = $this->empleadosConexion->prepare($query);
    
        if (!$stmt) {
            throw new RuntimeException("Error en la preparación de la consulta.");
        }
    
        try {

            $result = $stmt->execute();
    
            // Devuelve todos los resultados como un array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            // Manejamos el error registrándolo o informándolo
            error_log("Error en la consulta: " . $e->getMessage());
            return [];
        }
    }

    public function consultabajas()
    {
        if (!$this->empleadosConexion) {
            throw new RuntimeException("Error: No se pudo establecer la conexión a la base de datos.");
        }
    
        $query = "
            select b.id_baja, b.fechaBaja , e.apellidoPaterno, e.apellidoMaterno, e.nombreEmpleado, s.sucursales,e4.razonSocial, e2.estadoCorreo , e3.estadoFiniquito 
            from bajas b
            left join altas a on b.id_alta= a.id_alta
            left join empleado e on a.id_empleado = e.id_empleado 
            left join estatuscorreo e2 on b.id_estCorreo = e2.id_estCorreo 
            left join estatusfiniquito e3 on e3.id_estFiniquito = b.id_estFiniquito
            left join sucursales s on a.id_sucursal = s.id_sucursal
            left join empresas e4 on a.id_empresas = e4.id_empresas 
        ";
    
        $stmt = $this->empleadosConexion->prepare($query);
    
        if (!$stmt) {
            throw new RuntimeException("Error en la preparación de la consulta.");
        }
    
        try {

            $result = $stmt->execute();
    
            // Devuelve todos los resultados como un array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            // Manejamos el error registrándolo o informándolo
            error_log("Error en la consulta: " . $e->getMessage());
            return [];
        }
    }

    public function consultabajaspornombre($nombre)
    {
        if (!$this->empleadosConexion) {
            throw new RuntimeException("Error: No se pudo establecer la conexión a la base de datos.");
        }
    
        $query = "
            select b.id_baja, b.fechaBaja , e.apellidoPaterno, e.apellidoMaterno, e.nombreEmpleado, s.sucursales,e4.razonSocial, e2.estadoCorreo , e3.estadoFiniquito 
            from bajas b
            left join altas a on b.id_alta= a.id_alta
            left join empleado e on a.id_empleado = e.id_empleado 
            left join estatuscorreo e2 on b.id_estCorreo = e2.id_estCorreo 
            left join estatusfiniquito e3 on e3.id_estFiniquito = b.id_estFiniquito
            left join sucursales s on a.id_sucursal = s.id_sucursal
            left join empresas e4 on a.id_empresas = e4.id_empresas 
            where e.nombreEmpleado like :nombre 
        ";
    
        $stmt = $this->empleadosConexion->prepare($query);
    
        if (!$stmt) {
            throw new RuntimeException("Error en la preparación de la consulta.");
        }
    
        try {

            $result = $stmt->execute([
                ':nombre' => "%$nombre%"
            ]);
    
            // Devuelve todos los resultados como un array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            // Manejamos el error registrándolo o informándolo
            error_log("Error en la consulta: " . $e->getMessage());
            return [];
        }
    }
}