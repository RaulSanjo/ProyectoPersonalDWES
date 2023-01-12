<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rakkas&display=swap" rel="stylesheet">
    <title>Qatar 2022</title>
    <?php
        session_start();
    ?>
    <style>
    body{
            height: 100vh;
            width: 100vw;
            display: grid;
            background-image: url(https://img.freepik.com/vector-gratis/futbol-doha-qatar-2022-plantilla-fondo-geometrico-creativo-fondo-banner-web-futbol_1142-10478.jpg?w=2000);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
        }
        form{
            margin:  0;
            border: 20px ridge #B7245B;
            height: fit-content;
            width: fit-content;
            padding: 0;
            display: flex;
            flex-direction: row;
            background-color: black;
            padding: .8rem;
            border-radius: 0 50px ;
        }
        
        button{
            padding: .2rem;
            border-radius: 0 18px ;
            width: 9rem;
            font-size: 1.3rem;
            height: 3rem;
            font-family: 'Rakkas', cursive;
            color:white;
            border:5px solid white;
            background-color: rgb(183,36,91);
            
        }
        button:hover{
            cursor: pointer;
            background-color: white;
            color: #B7245B;
            border: white 3px solid ;
            box-shadow: rgba(183,36,91,1) 0 0 0 3px, rgba(183,36,91,.6) 0 0 0 6px, rgba(183,36,91,.4) 0 0 0 9px, rgba(255,255,255,.3) 0 0 0 13px;
        }
        div{
            margin: 2rem auto;
            transform: translateY(-7rem);
            display: flex;
            flex-direction: row;
        }
        p{
            margin: auto;
            font-size: 1.5rem;
            color: white;
            font-family: 'Orbitron', sans-serif;
            background-color: rgba(0,0,0,.5);
            padding: .3rem;
        }
    </style>
</head>
<body>
    <p>Su voto ha sido realizado correctamente.</p>
    <div>
        <form method="post" action="inicio.php">
            <button name="inicio">Inicio</button>
        </form>
        <form method="post" action="ranking.php">
            <button name="verRank">Ranking</button>
        </form>
    </div>
    <?php
        session_destroy();
        if(isset($_POST['inicio'])){
            header("Location: inicio.php");
        }
        if(isset($_POST['verRank'])){
            header("Location: ranking.php");
        }
    ?>
</body>
</html>