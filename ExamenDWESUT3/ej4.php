<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </style>
</head>
<body>
    <form method="post">
    <fieldset>
    <legend>usuario</legend>
        <input name="usuario"  required>
    </fieldset>
    <fieldset></fieldset>
    <legend>clave</legend>
        <input name="clave"  required>
    </fieldset>
        <button name="entrar">entrar</button>
    </form>
    <?php  
        if(isset($_POST['usuario'])){
            $usuario=$_POST['usuario'];
        }
        if(isset($_POST['clave'])){
            $clave=$_POST['clave'];
        }
    if (isset($_POST['entrar'])) {
        $servidor = "localhost";
        $user = "root";
        $password = "";
        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=DWES", $user, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = ("SELECT password FROM usuariosUT3 WHERE usuario_nombre ='" . $usuario . "'");
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                if ($registro['password'] == $clave) {
                    session_start();
                    $SESSION['usuario'] = $usuario;
                    echo "<br><br><h1>Gestion de noticias</h1><form method='get'><a href='consultarNoticias.php'>Consultar noticias</a><br>
                <a href='insertarNoticia.php'>Insertar nueva noticia</a><br>
                <a href='eliminarNoticia.php'>Eliminar noticias</a><br>
                [<button  name='desc'>desconectar</button>]
                </form>";
                    
                } else {
                    header("Location: noAutorizado.php");
                }
                if (isset($_POST["desc"])) {
                    echo "Sesion finalizada";
                    session_destroy();
                    header("Location: ej4.php");
                }

            }
        } catch (PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>