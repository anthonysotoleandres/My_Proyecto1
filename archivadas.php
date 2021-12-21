<?php //mostrar las tareas archivadas
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db,$port);
    if ($conexion->connect_error) die ("Fatal error");
   
    session_start();
    $iduser=$_SESSION['id_usuario'];

    $query = "SELECT * FROM archivar WHERE usuarios_idusuarios2 =$iduser
            ORDER BY fecha_vencimiento2 ASC";
    $result = $conexion->query($query);
    echo <<<_END
    <h1>Tareas Archivadas</h1>
    _END;

    if (!$result) die ("Falló el acceso a la base de datos");

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; $j++)
    {

        $row = $result->fetch_array(MYSQLI_NUM);
        $r0 = htmlspecialchars($row[0]);
        $r1 = htmlspecialchars($row[1]);
        $r2 = htmlspecialchars($row[2]);
        $r3 = htmlspecialchars($row[3]);
        $r4 = htmlspecialchars($row[4]);
        $r5 = htmlspecialchars($row[5]);
        echo <<<_END
        <pre>
        Titulo: $r1
        Contenido: $r2
        Fecha de Registro: $r3
        Fecha de Vencimiento: $r4
        Prioridad: $r5
        _END;
    }

    echo <<<_END
    <form method="post"><pre> 
    <a href="task.php"><input type="button" value = "Ver Tareas "></a> 
    </form>
    _END;

    $result->close();
    $conexion->close();

    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }


    

?>
