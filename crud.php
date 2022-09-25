<?php
include_once 'db.php';

/* codigo para insertar datos */
if (isset($_POST['save'])) 
{
    $id = $MySQLiconn->real_escape_string($_POST['id']); 
    $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
    $apellido = $MySQLiconn->real_escape_string($_POST['apellido']);
    $telefono = $MySQLiconn->real_escape_string($_POST['telefono']);
    $direccion = $MySQLiconn->real_escape_string($_POST['direccion']);
    
    $SQL = $MySQLiconn->query("INSERT INTO contactos(id, nombre, apellido, telefono, direccion) VALUES('$id','$nombre','$apellido','$telefono','$direccion')");

    if (!$SQL) 
    {
        echo $MySQLiconn->error;    
    }
}
    
    /* codigo para insertar datos */

    /* codigo para eliminar datos */
if (isset($_GET['del']))
    {
        $SQL = $MySQLiconn->query("DELETE FROM contactos WHERE id=".$_GET['del']);
        header("Location: index.php");
    }
    /* code for eliminar datos */


    /* codigo para actualizar */
if (isset($_GET['edit'])) 
    {
        $SQL = $MySQLiconn->query("SELECT * FROM contactos WHERE id=".$_GET['edit']);
        $getROW = $SQL->fetch_array();

    }

if (isset($_POST['update'])) 
    {
        $SQL = $MySQLiconn->query("UPDATE contactos SET id='".$_POST['id']."', nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."', telefono='".$_POST['telefono']."', direccion='".$_POST['direccion']."' WHERE id=".$_GET['edit']);
        header("Location: index.php");
    }

?>

