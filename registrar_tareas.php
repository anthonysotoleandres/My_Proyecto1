<?php //registrar nueva tarea
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);
    if ($conexion->connect_error) die ("Fatal error");

    session_start();
    $iduser=$_SESSION['id_usuario'];

    if (isset($_POST['titulo']) &&
        isset($_POST['contenido']) &&
        isset($_POST['fecha_registro']) &&
        isset($_POST['fecha_vencimiento']) &&
        isset($_POST['prioridad']) )
    {
        $title = get_post($conexion, 'titulo');
        $conteni = get_post($conexion, 'contenido');
        $registro = get_post($conexion, 'fecha_registro');
        $vencimiento = get_post($conexion, 'fecha_vencimiento');
        $priori = get_post($conexion, 'prioridad');
        $query = "INSERT INTO tareas_task VALUE" .
            "('$iduser', '$title', '$conteni', '$registro', '$vencimiento','$priori')";
        $result = $conexion->query($query);
        if (!$result) echo "INSERT falló <br><br>";
        header('Location: task.php');
    }
    else
    {
        echo <<<_END
        
        <h1>Ingresar Tarea</h1>
        <form action="registrar_tareas.php" method="post"><pre>
        <input type="hidden" name="usuarios_idusuarios" value="$iduser">
        Titulo
        <input type="text" name="titulo" size="32" maxlength="64" ">

        Contenido
        <textarea name="contenido" cols="32" rows="4" wrap="off">
        </textarea>
        Fecha de Registro  
        <input type="date" name="fecha_registro" >

        Fecha de Vencimiento 
        <input type="date" name="fecha_vencimiento" >

        Prioridad
        <select name="prioridad" size="1">
        <option value="Alto">Alto</option>
        <option value="Medio">Medio</option>
        <option value="Bajo">Bajo</option>
        </select>  

        <input type="submit" value="Subir Tarea"> <a href="task.php"><input type="button" value = "Ver Tareas "</a>
        <pre>
        <a href="cerrar.php"><input type="button" value = "Cerrar Session"></a> 
        </form>
        _END;
    }
    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        //if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }  
      
    function get_post($con, $var)
      {
          return $con->real_escape_string($_POST[$var]);
      }
?>