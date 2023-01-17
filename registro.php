<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <title>Qatar 2022</title>
    <style>
        body{
            display: grid;
            height: 100vh;
            width: 100vw;
            margin: 0;
            background-image:url(https://img.freepik.com/vector-gratis/fondo-campo-futbol-degradado_23-2149000103.jpg?w=2000);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        form{
            display: flex;
            flex-direction: column;
            margin: auto;
            width: 400px;
            background-image: url(https://img.freepik.com/vector-premium/fondo-copa-mundial-futbol-banner-campeonato-futbol-2022-qatar_29865-3050.jpg?w=2000);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding:2rem;
        }
        form * {
            margin:.2em;
            font-family: 'Syncopate', sans-serif;
        }
        input{
            padding: .6rem;
            font-size: 1.2em;
            background-color: black;
            color: white;
        }
        input[type="checkbox"]{
            height: 1.2rem;
            width: 1.2rem;
            transform: translateY(.2rem);
        }
        p{
            text-align: center;
            font-weight: bolder;
            background-color: rgba(255,255,255,.9);
            padding: .2em .3rem .5rem;
            border-radius: 15px;
            height: fit-content;
            width: fit-content;
            font-size: 80%;
        }
        h1{
            background-color: rgba(255,1,77,.8);
            text-align: center;
            font-size: 3em;
            font-family: 'Orbitron', sans-serif;
            border:5px solid white;
            text-shadow: 2px 2px 1px white;
        }
        button{
            margin-left:39%;
            border-radius: 1em;
            background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(14,174,87,1) 0%, rgba(12,116,117,1) 90% );
            padding: .6rem .9rem;
            margin: 1em auto 0;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2em;
            border: 4px solid black;
            transition: .8s;
        }
        button:hover{
            cursor: pointer;
            color: white;
            border: white 3px solid ;
            box-shadow: rgba(14,174,87,1) 0 0 0 3px, rgba(14,174,87,.6) 0 0 0 6px, rgba(12,116,117,1) 0 0 0 9px, rgba(12,116,117,.7) 0 0 0 12px, rgba(255,255,255,.3) 0 0 0 15px;
        }
        .msg{
            width: fit-content;
            height: fit-content;
            color:red;
            font-weight: bolder;
            font-size: 120%;
            margin: 1em auto;
            padding:2em;
            background-color: black;
            border:7px solid white;
        }
        b{
            color:white;
        }
    </style>
</head>
<body>
    <form method="get">
        <h1>REGISTRO</h1>
        <input name="nombre" placeholder="Nombre de usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <input type="password" name="contraseña2" placeholder="Repita la contraseña">
        <p><input type=checkbox name="tyc" required>&nbsp;Acepto los terminos y condiciones</p>
        <button name="registrarse">Registrarme</button>
    </form>
    <?php
        $usuario=$contraseña=$contraseña2="";
        $tyc=false;
        if(isset($_GET['nombre'])){
            $usuario=$_GET['nombre'];
        }
        if(isset($_GET['contraseña'])){
            $contraseña=$_GET['contraseña'];
        }
        if(isset($_GET['contraseña2'])){
            $contraseña2=$_GET['contraseña2'];
        }
        if(isset($_GET['tyc'])){
            $tyc=$_GET['tyc'];
        }
        //Parámetros de conexion
    $host='localhost';
    $db='votacion';
    $user='root';
    $pass='';
    // Crear conexion
    $conexion=new mysqli();
    $conexion -> connect($host,$user, $pass, $db );
    // Comprobar que no ha habido ningún error durante la conexión
    $error=$conexion->connect_errno;
    //Si hay errores
    if($error!=null){
        echo "<p>Error $error conectando a la base de datos: $conexion->connect_error</p>";
    }else{
        if(isset($_GET['registrarse'])){
            $usuarioExistente=false;
            //Consulta sql
            $sql='Select nombreUsuario from usuarios';
            $result=$conexion->query($sql);
            //Si devuelve algun resultado
            if($result->num_rows>0){
                //Por cada linea de la consulta
                while($row = $result->fetch_assoc()) {
                    if($usuario==$row['nombreUsuario']) {
                        $usuarioExistente=true;
                    }
                }
            }
            if($usuarioExistente==true){
                echo "<p class='msg'>El usuario <b>'$usuario'</b> ya ha sido registrado anteriormente!</p>";
            }else{
                if($contraseña==$contraseña2){
                    $contraseña=md5($contraseña);
                    $sql='Insert into usuarios (nombreUsuario,contraseña) values("'.$usuario.'","'.$contraseña.'")';
                    $insert=$conexion->query($sql);
                    if($insert){
                        echo "<p class='msg'>Usuario registrado con exito!<br>";
                        echo "Redirigiendo...</p>";
                        header( "refresh:2;url=inicioSesion.php" );
                    } else{
                        echo "<p class='msg'>No se ha podido completar el registro</p>";
                    }  
                }
            }
        }
    }
    ?>
</body>
</html>