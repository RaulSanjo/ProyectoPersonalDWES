<!DOCTYPE html>
<html lang="en">
<head>
<?php
        session_start(); 
        if (!isset($_SESSION['sesionUsuario'])) {
            header("Location: inicioSesion.php");
    } else {
    if (isset($_POST['enviar']) && isset($_POST['voto'])) {
        $voto = $_POST['voto'];
        //Parámetros de conexion
        $host = 'localhost';
        $db = 'votacion';
        $user = 'root';
        $pass = '';
        // Crear conexion
        $conexion = new mysqli();
        $conexion->connect($host, $user, $pass, $db);
        // Comprobar que no ha habido ningún error durante la conexión
        $error = $conexion->connect_errno;
        //Si hay errores
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos: $conexion->connect_error</p>";
        } else {
            $result1 = $conexion->query('update votos set numeroVotos=numeroVotos+1 where jugador="' . $voto . '"');
            $result2 = $conexion->query('update usuarios set haVotado=1 where nombreUsuario="' . $_SESSION['sesionUsuario'] . '"');
            header("Location: votoRealizado.php");
        }
    }
    if (isset($_POST['out'])) {
        session_destroy();
    }   
}
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <title>Qatar 2022</title>
    <style>
        body{           
            background-image: url("fondo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            width: 100vw; min-height:100vh;
            display: grid;
            margin: 0;
        }
        #content{
            min-width: 600px;
            background-color: rgba(255,1,77,.7);
            margin: 0 auto auto;
            border-radius: 1.5rem;
            border:7px solid black;
            transition: .8s;
            transform: translateY(-2.5em);
        }
        #content:hover{
            background-color: rgba(255,1,77,1);
        }
        #content form{
            padding-top: 1rem;
            width:100%;
            margin-right: 1rem;
            min-width: 40rem;
            padding-left: 1rem;
            font-family: 'Secular One', sans-serif;
        }
        h1{
            margin: auto;
            margin-top: 16rem;
            margin-bottom: 0;
            height: fit-content;
            width: 75vw;
            background-color: rgba(0,0,0,.7);
            color:white;
            text-shadow: 5px 5px 10px #FF014D, 10px 10px 10px black;
            padding: 1rem 2rem;
            border-radius: 20px;
            font-family: 'Syncopate', sans-serif;
            text-align: center;
            font-size: 2.6rem;
            border: #FF014D 12px solid ;
            transform: translateY(-3rem);
            min-width: 650px;
        }
        #content p{
            background-color: #fddfd4;
            border-radius: 1rem;
            padding: .6rem .4rem;
            display: inline-block;
            width: 22.5vw;
            margin: .4rem .3rem;
            padding: 0;
            border: 3px solid black;
            transition: .6s;
            cursor: default;
            font-size: 1.5em;
            min-width: 11.5rem;
        }
        .alemania:hover{
            box-shadow: 0 0 10px red, 0 0 20px black, 0 0 50px red;
        }
        .borussia:hover{
            box-shadow: 0 0 10px yellow, 0 0 20px black, 0 0 50px yellow;
        }
        .barsa:hover{
            box-shadow: 0 0 10px red, 0 0 20px blue, 0 0 50px red;
        }
        .argentina:hover{
            box-shadow: 0 0 10px aqua, 0 0 20px white, 0 0 50px aqua;
        }
        .holanda:hover{
            box-shadow: 0 0 10px orangered, 0 0 20px black, 0 0 50px orangered;
        }
        .france:hover{
            box-shadow: 0 0 10px blue, 0 0 20px white, 0 0 30px red;
        }
        .portugal:hover{
            box-shadow: 0 0 10px green, 0 0 30px red;
        }
        .england:hover{
            box-shadow: 0 0 10px white, 0 0 30px red, 0 0 50px white;
        }
        button{
            margin-left:39%;
            border-radius: 1em;
            background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(14,174,87,1) 0%, rgba(12,116,117,1) 90% );;
            margin-bottom: 1.5em;
            padding: .6rem .9rem;
            margin-top: 1em;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2em;
            border: 3px solid black;
            transition: .8s;
        }
        button:hover{
            cursor: pointer;
            color: white;
            border: white 3px solid ;
            box-shadow: rgba(14,174,87,1) 0 0 0 3px, rgba(14,174,87,.6) 0 0 0 6px, rgba(12,116,117,1) 0 0 0 9px, rgba(12,116,117,.7) 0 0 0 12px, rgba(255,255,255,.3) 0 0 0 15px;
        }
        input[type="radio"] {
            margin-right: .4rem;
            transform: translateY(.1em);
            font: inherit;
            width: 1em;
            height: 1em; 
            accent-color: #FF014D;
        }
        input[type="radio"]:checked+span{
            color:#FF014D;
        }
        header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin:0;
            width: 100%;
            background: #FF014D;
            color:white;
            padding: 0;
            height: 5.2rem;
        }
        header form{
            display: flex;
            align-items: center;
            justify-content: right;
            width: 40vw;
            padding-left: 0;
            transform: translateX(-1rem);
        }
        header img{
            width: 150px;
            height: 5rem;
        }
        header button{
            margin-right: .5rem;
            margin-left: 0;
            background-image: none;
            background-color: black;
            border: 5px solid white;
            color: #FF014D;
            transform: translateY(.2rem);
        }
        header div{
            display: flex;
            width: 100%;
        }
        header p{
            margin-left: 30%;
            margin-right: 0;
            font-family: 'Zen Dots', cursive;
            font-size: 1.3rem;
            width: fit-content;
            transform: translateY(.5rem);
        }
    </style>
</head>
<body>
    <header>
        <div>
            <img src="https://images.daznservices.com/di/library/DAZN_News/cd/6e/mundial-de-qatar-laeeb_i6fo0p2y7r6i15bu09jtz944e.jpg?t=&w=1280&h=720#61;-173822905">
            <p>VAMOS ESPAÑA!</p>
        </div>
        <form method="post" action="cerrarSesion.php">
            <button name="out">Cerrar sesión</button>
        </form>
    </header>
<h1>Quién es la mejor joven promesa del mundial?</h1>
    <div id="content">
    <form name="f" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">    
    <div class="votos">
        <p class="alemania"><input type="radio" name="voto" value="Musiala"><span>Musiala</span></p>
        <p class="borussia"><input type="radio" name="voto" value="Bellingham"><span>Bellingham</span></p>
        <p class="barsa"><input type="radio" name="voto" value="Pedri"><span>Pedri</span></p>
    </div>
    <div class="votos">
        <p class="argentina"><input type="radio" name="voto" value="E. Fernández"><span>E. Fernández</span></p>
        <p class="borussia"><input type="radio" name="voto" value="Moukoko"><span>Moukoko</span></p>
        <p class="holanda"><input type="radio" name="voto" value="Xavi Simons"><span>Xavi Simons</span></p>
    <div class="votos">
        <p class="france"><input type="radio" name="voto" value="Camavinga"><span>Camavinga</span></p>
        <p class="barsa"><input type="radio" name="voto" value="Pablo Gavi"><span>Pablo Gavi</span></p>
        <p class="holanda"><input type="radio" name="voto" value="Gravenberch"><span>Gravenberch</span></p>
    </div>
    <div class="votos">
        <p class="portugal"><input type="radio" name="voto" value="Rafael Leão"><span>Rafael Leão</span></p>
        <p class="england"><input type="radio" name="voto" value="Phil Foden"><span>Phil Foden</span></p>
        <p class="portugal"><input type="radio" name="voto" value="G. Ramos"><span>G. Ramos</span></p>
    </div>
    <button name="enviar">Enviar voto</button>
    </form>
</div>
</body>
</html>