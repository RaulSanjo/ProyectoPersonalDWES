<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet"> 
    <title>Qatar 2022</title>
    <style>
        body{
            
            width: 100vw; height:100vh;
            display: grid;
            margin: 0;
            background-image: url(https://assets.goal.com/v3/assets/bltcc7a7ffd2fbf71f5/blta6ec8fe28cd46e7e/60db5ab420a5380ed1a1e624/5a3ddaf680515fe6132489b7f36781e3180f4f7b.jpg);
            background-repeat: no-repeat;
            background-size: cover;background-position: center;
        }
        p{
            margin: auto;
            text-align: center;
            background-color: black;
            color:white;
            padding:1.5em;
            border:5px solid #23663b;
            font-family: 'Zen Dots', cursive;
            
        }
        a{
            color:white;
            font-size: 200%;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        //arranco la sesion
        session_start();
        //elimino la sesion
        session_destroy();
        echo "<p>Disfruta del mundial en <a href='https://golmundial.com/'>golmundial.com</a><br><br><br>Redirigiendo...</p>";
        //redirijo al login en 4 segundos de delay
        header( "refresh:4;url=inicio.php" );
    ?>
</body>
</html>