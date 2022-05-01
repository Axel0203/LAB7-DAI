<?php
include 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <!-- iconos -->
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- estilos -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <!-- FORMULARIO DE REGISTRO -->
        <form method="post">
            <table class="form">
                <tr>
                    <td>
                        <input type="number" name="year" placeholder="Año" id="" value="<?php if(isset($_GET['edit'])) echo $arrayRow['year'] ?>" size="60">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="autor" placeholder="Autor" id="" value="<?php if(isset($_GET['edit'])) echo $arrayRow['autor'] ?>" size="60">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="titulo" placeholder="Título" id="" value="<?php if(isset($_GET['edit'])) echo $arrayRow['titulo'] ?>" size="60">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="url" name="url" placeholder="Dirección web del libro digital" required id="" value="<?php if(isset($_GET['edit'])) echo $arrayRow['url'] ?>" size="60">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="especialidad" placeholder="Especialidad" id="" value="<?php if(isset($_GET['edit'])) echo $arrayRow['especialidad'] ?>" size="60"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="editorial" placeholder="Editorial" id="" value="<?php if(isset($_GET['edit'])) echo $arrayRow['editorial'] ?>" size="60">
                    </td>
                </tr>
                <tr>
                        <td>
                            <?php
                            if(isset($_GET['edit'])) {
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

        <!-- VISTA DE REGISTROS -->
        <table border=1 class="registro">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Año</th>
                    <th>Autor</th>
                    <th>Título</th>
                    <th>Especialidad</th>
                    <th>Editorial</th>
                    <th>URL</th>
                    <th colspan=2>Acciones</th>
                </tr>
                <tbody>
                    <?php
                    $res = $MySQLiconn->query("SELECT * FROM libros");
                    while($row = $res->fetch_array())
                    {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><?php echo $row['autor']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['especialidad']; ?></td>
                            <td><?php echo $row['editorial']; ?></td>
                            <td><a href="<?php echo $row['url']; ?>" target="_blank"><span class="material-symbols-outlined">link</span></a></td>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar edición')"><span class="material-symbols-outlined">edit</span></a>
                            </td>
                            <td>
                                <a href="index.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar eliminación')"><span class="material-symbols-outlined">delete</span></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
</body>
</html>