<?php //modificar contenido
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db,$port);
    if ($conexion->connect_error) die ("Fatal error");

    $titul = mysql_entities_fix_string($conexion, $_POST['titulo']);
    $modific = mysql_entities_fix_string($conexion, $_POST['contenido']);

    $query = "UPDATE tareas_task SET contenido= '$modific'
            WHERE titulo='$titul'";
    $result = $conexion->query($query);

    if (!$result) die ("Consulta falló");
    header('Location: task.php');




    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        //if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      } 
?>
