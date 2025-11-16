<?php
ob_start();
session_start(); //Inicia sesion

include 'conexion.php';
$con = conectar();

$User = $_POST['usuario'] ?? '';
$Password = $_POST['contrasena'] ?? '';

login($con, $User, $Password);

function login($con, $User, $Password){
    try{
        // Consulta usando prepared statements
        $stmt = $con->prepare("SELECT Usuario, Nombre, nivel 
                            FROM usuarios 
                            WHERE Usuario = ? AND Contrasena = ?");
        $stmt->bind_param("ss", $User, $Password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            session_regenerate_id(true); // Nueva sesión segura
            
            // Guardar datos esenciales del usuario en la sesión
            $_SESSION['usuario'] = $usuario['Usuario'];
            $_SESSION['nombre'] = $usuario['Nombre'];
            $_SESSION['nivel'] = $usuario['nivel'];

            // Redirección
            header("Location: ../html/index.php");
            exit;

        } else {
            header("Location: ../html/index.php?error=1");
            exit;
        }

    } catch(Exception $e){
        echo "Error: ".$e->getMessage();
    }
}
ob_end_flush();
?>