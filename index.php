<?php // iniciar sesion
  require_once 'login.php';
  $conexion = new mysqli($hn, $un, $pw, $db, $port);
  
  if($conexion->connect_error) die("Error fatal");

  if (isset($_POST['username'])&&
      isset($_POST['password']))
  {
      $un_temp = mysql_entities_fix_string($conexion, $_POST['username']);
      $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);
      $query   = "SELECT * FROM usuarios WHERE username='$un_temp'";
      $result  = $conexion->query($query);
      
      if (!$result) die ("Usuario no encontrado");
      elseif ($result->num_rows)
      {
          $row = $result->fetch_array(MYSQLI_NUM);
          $result->close();

          if (password_verify($pw_temp, $row[4])) 
          {
              session_start();
              $_SESSION['id_usuario'] = $row[0];
              header('Location: registrar_tareas.php');
          }
          else {
              echo "Usuario/password incorrectoxdd <p><a href='registrar.php'>
          Registrarse</a></p>
          <p><a href='index.php'>
          Volver</a></p>";
          }
      }
      else {
        echo "Usuario/password incorrectoooo <p><a href='registrar.php'>
    Registrarse</a></p>
    <p><a href='index.php'>
          Volver</a></p>";
    }   
  }
  else
  {
    echo <<<_END
    <h1>Iniciar Sesion</h1>
    <form action="index.php" method="post"><pre>
    Usuario  <input type="text" name="username">
    Password <input type="password" name="password" >
             <input type="submit" value="INGRESAR">
             <a href="registrar.php"><input type="button" value = "Registrarce"</a>
    </form>
    _END;
  }

  $conexion->close();

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
