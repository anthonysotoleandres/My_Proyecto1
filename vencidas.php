<?php //mostrar tareas vencidas
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db,$port);
    if ($conexion->connect_error) die ("Fatal error");

    session_start();
    $iduser=$_SESSION['id_usuario'];

    if (isset($_POST['delete']) && isset($_POST['titulo']))
    {   
        $titl = get_post($conexion, 'titulo');
        $query = "DELETE FROM tareas_task WHERE titulo='$titl'";
        $result = $conexion->query($query);
        if (!$result) echo "BORRAR falló"; 
    }



    $query = "SELECT * FROM tareas_task WHERE usuarios_idusuarios =$iduser
            ORDER BY fecha_vencimiento ASC";
    $result = $conexion->query($query);
    
    echo <<<_END
    <h1>Tareas Vencidas</h1>
    _END;

    if (!$result) die ("Falló el acceso a la base de datos");

    $rows = $result->num_rows;

    date_default_timezone_set("America/Lima"); 
    $hora =date("Y-m-d", time());

        for ($j = 0; $j < $rows; $j++)
        {

            $row = $result->fetch_array(MYSQLI_NUM);
            $r0 = htmlspecialchars($row[0]);
            $r1 = htmlspecialchars($row[1]);
            $r2 = htmlspecialchars($row[2]);
            $r3 = htmlspecialchars($row[3]);
            $r4 = htmlspecialchars($row[4]);
            $r5 = htmlspecialchars($row[5]);
            if ($hora > $r4)
            {
            echo <<<_END
            <pre>
            Titulo: $r1
            Contenido: $r2
            Fecha de Registro: $r3
            Fecha de Vencimiento: $r4
            Prioridad: $r5
            </pre>
            </pre>
            <form action='task.php' method='post'>
            <input type='hidden' name='delete' value='yes'>
            <input type='hidden' name='titulo' value='$r1'>
            <input type='submit' value='Borrar'></form>
            _END;
            }
        }
        echo <<<_END
        <form method="post"><pre>
        
        <a href="task.php"><input type="button" value = "Ver Todas las Tareas"</a>
        </form>
        _END;    
    

    $result->close();
    $conexion->close();

    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }


    

?>