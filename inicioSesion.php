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
            margin:  auto;
            border: 20px ridge #B7245B;
            height: fit-content;
            width: fit-content;
            padding: .3em;
            display: flex;
            flex-direction: row;
            background-color: black;
            padding: 2rem;
            border-radius: 0 50px ;
        }
        
        button{
            padding: .2rem;
            border-radius: 10px;
            width: 9rem;
            margin:1rem;
            height: 3rem;
            font-family: 'Rakkas', cursive;
            color:white;
            border:5px solid white;
            background-color: rgb(183,36,91);
            transform: translate3d(.8rem,.5rem,0);
        }
        button:hover{
            cursor: pointer;
            background-color: white;
            color: #B7245B;
            border: white 3px solid ;
            box-shadow: rgba(183,36,91,1) 0 0 0 3px, rgba(183,36,91,.6) 0 0 0 6px, rgba(183,36,91,.4) 0 0 0 9px, rgba(255,255,255,.3) 0 0 0 13px;
        }
        input{
            font-size: 150%;
            padding-left: .4rem;
            border-radius: 5px 2rem 2rem 5px;
            color:white;
            background-color: #B7245B;
            font-family: 'Secular One', sans-serif;
        }
        input:focus{
            background-color: white;
            color: black;
        }
        legend{
            color:white;
            font-weight: bolder;
            font-size: 120%;
            text-transform: uppercase;
            color:#B7245B;
            font-family: 'Orbitron', sans-serif;
        }
        fieldset{
            border-color:#B7245B;
            border-width: 8px;
        }
    </style>
</head>
<body>
    
    <form method="get">
    <fieldset>
    <legend>Nombre de usuario</legend>
        <input name="usuario"  required>
    </fieldset>
    <fieldset>
    <legend>Contraseña</legend>
        <input type="password" name="contraseña"  required>
    </fieldset>
        <button name="entrar">Entrar</button>
    </form>
</body>
</html>