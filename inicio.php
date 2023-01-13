<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rakkas&display=swap" rel="stylesheet">
    <title>MUNDIAL</title>
    <style>
        body{
            height: 100vh;
            width: 100vw;
            display: grid;
            margin: 0;
            background-image: url(https://images8.alphacoders.com/128/1286559.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        form{
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            transform: translateY(-5rem);
        }
        h1{
            font-family: 'Kodchasan', sans-serif;
            padding: .8rem;
            transform: translateY(-3rem);
            border-radius: 50px;
            margin: auto;
            text-align: center;
            height: fit-content;
            width: fit-content;
            font-size: 8rem;
            text-shadow: 1px 1px 10px white;
            box-shadow: rgba(183,36,91,1) 0 0 0 8px, rgba(183,36,91,.6) 0 0 0 16px;
            text-shadow: 10px 2px 2px #B7245B;
        }
        button{
            padding: .8rem;
            border-radius: 10px;
            width: 18rem;
            margin:2rem;
            font-size: 1.5rem;
            font-family: 'Rakkas', cursive;
            color:white;
            border:5px solid white;
            background-color: rgb(183,36,91);
        }
        button:hover{
            cursor: pointer;
            background-color: white;
            color: #B7245B;
            font-size: 2rem;
            text-transform: uppercase;
            font-weight: bolder;
            border: white 3px solid ;
            box-shadow: rgba(183,36,91,1) 0 0 0 3px, rgba(183,36,91,.6) 0 0 0 6px, rgba(183,36,91,.4) 0 0 0 9px, rgba(255,255,255,.3) 0 0 0 13px;
        }
        
    </style>
</head>
<body>
    <h1>INICIO</h1>
    <form method="post">
        <button id="in" name="iniciar">Iniciar sesión</button>
        <button id="rg" name="registrarse">Registrarse</button>
        <button id="rk" name="rank">Ver ranking</button>
    </form>
    <?php
        if(isset($_POST['iniciar'])){
            header("Location: controladorInicioSesion.php");
        }
        if(isset($_POST['registrarse'])){
            header("Location: controladorRegistro.php");
        }
        if(isset($_POST['rank'])){
            header("Location: controladorRanking.php");
        }
    ?>
</body>
</html>