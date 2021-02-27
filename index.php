    <?php
        include("./fragmentos/header.php");
    
    ?>

    <center><h1>Proyecto</h1></center>
    <div class="row">
    <div class="col-6 col-md-2"></div>
    <div class="col-6 col-md-4">        
            <form action="index.php" method="post">
                <label for="id" class="form-label">ID:</label>
                <input type="text" name="id" id="id" class="form-control"><br>
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control"><br>
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control"><br>
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control"><br>
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" name="direccion" id="direccion" class="form-control"><br>
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control"><br>
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control"><br>
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" class="form-control"><br>
                <label for="contraseña2" class="form-label">confirme contraseña:</label>
                <input type="password" name="contraseña2" id="contraseña2" class="form-control"><br>
                <input type="submit" value="Ingresar" name="btningresar" class="btn btn-primary">
            </form>

        <?php
            if (isset($_POST['btningresar'])) {
                $_id = $_POST['id'];
                $_nombre = $_POST['nombre'];
                $_apellido = $_POST['apellido'];
                $_telefono = $_POST['telefono'];
                $_direccion = $_POST['direccion'];
                $_correo = $_POST['correo'];
                $_usuario = $_POST['usuario'];
                $_contraseña1 = $_POST['contraseña'];
                $_contraseña2 = $_POST['contraseña2'];

                if ($_contraseña1 === $_contraseña2) {
                    
                    include("./clases/conexionOpen.php");

                        $conexion->query("INSERT INTO $tb1(user, pass) VALUES('$_usuario','$_contraseña1')");

                        $conexion->query("INSERT INTO $tb2(id, nombre, apellido, telefono, direccion, correo, user) 
                        VALUES('$_id','$_nombre','$_apellido','$_telefono','$_direccion','$_correo','$_usuario')");

                    include("./clases/conexionClose.php");
                    echo "se registro correctamente";


                }else {
                    echo "las contraseñas no coinciden";
                }
            }
        
        ?>
    </div>
    <div class="col-6 col-md-3">
            <form action="index.php" method="post">
            <label for="id" class="form-label">ID:</label>
            <input type="text" name="id" id="id" class="form-control"><br>
            <input type="submit" value="Buscar" name="btnbuscar" class="btn btn-danger">
            </form>
            <?php
                if (isset($_POST['btnbuscar'])) {
                    
                    $_id = $_POST['id'];

                    include("./clases/conexionOpen.php");
                    $resultados = mysqli_query($conexion, "SELECT * FROM $tb2 WHERE id = $_id");
                    while ($consulta = mysqli_fetch_array($resultados)) {
                        echo "
                        <table class=\"table\">
                        <tr>
                        <td><center><b>ID</b></center></td>
                        <td><center><b>Nombre</b></center></td>
                        <td><center><b>Apellido</b></center></td>
                        <td><center><b>Telefono</b></center></td>
                        <td><center><b>Direccion</b></center></td>
                        <td><center><b>Correo</b></center></td>
                        <td><center><b>Usuario</b></center></td>
                        </tr>
                        <td><center>".$consulta['id']."</center></td>
                        <td><center>".$consulta['nombre']."</center></td>
                        <td><center>".$consulta['apellido']."</center></td>
                        <td><center>".$consulta['telefono']."</center></td>
                        <td><center>".$consulta['direccion']."</center></td>
                        <td><center>".$consulta['correo']."</center></td>
                        <td><center>".$consulta['user']."</center></td>
                        </table>
                        ";
                    }
                    include("./clases/conexionClose.php");

                }
                
            
            ?>

            <div class="col-6 col-md-3"></div>
    </div>
  </div>
            

    <?php
        include("./fragmentos/footer.php");
    
    ?>
