<?php
include 'conexion.php';
$con = conectar();

function datos($con){
    try{
        $consulta="select * from usuarios";
        $res = $con->query($consulta);
        return $res;
    }catch(Exception $e){
        echo "El error es: " . $e->getMessage();
    }
}
?>