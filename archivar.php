<?php //archivar las tareas
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);
    if ($conexion->connect_error) die ("Fatal error");
    
        $iduser = mysql_entities_fix_string($conexion, $_POST['usuario_idusuario']);
        $title = mysql_entities_fix_string($conexion, $_POST['titulo']);
        $conteni = mysql_entities_fix_string($conexion, $_POST['contenido']);
        $registro = mysql_entities_fix_string($conexion, $_POST['fecha_registro']);
        $vencimient = mysql_entities_fix_string($conexion, $_POST['fecha_vencimiento']);
        $prior = mysql_entities_fix_string($conexion, $_POST['prioridad']);


        $query = "INSERT INTO archivar
            VALUES($iduser,'$title','$conteni','$registro', '$vencimient', '$prior')";

        $result = $conexion->query($query);
        if (!$result) die ("Falló registro");

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