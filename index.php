<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de contactos</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <center>
        <br>
        <br>
        <div id="form">
            <form method="post">
                <table width="100%" border="1" cellpading="15">
                    <tr>
                        <td>
                            <input type="text" name="id" placeholder="Ingrese el id" value="<?php if(isset($_GET['edit'])) echo $getROW['id']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="nombre" placeholder="Ingrese el nombre" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="apellido" placeholder="Ingrese el apellido" value="<?php if(isset($_GET['edit'])) echo $getROW['apellido']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="telefono" placeholder="Ingrese el Nro de telefono" value="<?php if(isset($_GET['edit'])) echo $getROW['telefono']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="direccion" placeholder="Ingrese la direccion" value="<?php if(isset($_GET['edit'])) echo $getROW['direccion']; ?>">
                        </td>
                    </tr>
                        <td>
                            <?php
                            if (isset($_GET['edit'])) {
                                ?>
                                <button type="submit" name="update">Editar</button>
                                <?php
                            }else{
                                ?>
                                <button type="submit" name="save">Registrar</button>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>                     
                </table>
            </form>
        </div>
            <br><br>
        <div class="">
        <table width="50%" border="1" cellpadding="15"  name='contactos'>
                <?php
                $res = $MySQLiconn->query("SELECT * FROM contactos");
                while ($row=$res->fetch_array()) {
                    ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>                    
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
                    <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
            
    </center>
</body>
</html>