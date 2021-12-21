<?php //cerrar sesion
    session_start();

    if (isset($_SESSION['username']))
    {
        $nombre = $_SESSION['username'];
        $apellido = $_SESSION['password'];

        destroy_session_and_data();

        header('Location: iniciar.php');
        die();
    }
    else header('Location: index.php');

    function destroy_session_and_data()
    {
        //session_start();
        $_SESSION = array();
        setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
    }
?>