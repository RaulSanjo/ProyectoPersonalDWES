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
            min-height: 100vh;
            width: 100vw;
            display: grid;
            background-image: url(https://img.freepik.com/vector-gratis/futbol-doha-qatar-2022-plantilla-fondo-geometrico-creativo-fondo-banner-web-futbol_1142-10478.jpg?w=2000);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
        }
        form{
            margin:  1rem 0;
            border: 20px ridge #B7245B;
            height: fit-content;
            width: fit-content;
            padding: 0;
            display: flex;
            flex-direction: row;
            background-color: black;
            padding: .8rem;
            border-radius: 0 50px ;
            transform: translateY(7rem);
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
            margin: 0 auto;
            transform: translateY(-7rem);
            display: flex;
            flex-direction: row;
        }
        h1{
            margin: 1rem auto;
            font-family: 'Orbitron', sans-serif;
            font-size: 3rem;
            border-bottom: white solid 3px;
            padding-bottom: .4rem;
            text-shadow: 2px -1px 0 white;
        }
        p{
            margin: .2rem 0;
            font-size: 1.5rem;
            color: white;
            font-family: 'Orbitron', sans-serif;
        }
        p:nth-of-type(1){
            color:gold;
        }
        p:nth-of-type(2){
            color:silver;
        }
        p:nth-of-type(3){
            color:#cd7f32;
        }
        .rank{
            display: flex;
            flex-direction: column;
            border:10px ridge white;
            border-radius: 0 4rem 0 2rem;
            transform: translateY(0);
            padding: .5rem 1rem;
            height: fit-content;
            background-color: rgba(183,36,91,.7);
        }
        hr{
            width: 3rem;
        }
    </style>
</head>
<body>
    <h1>Ranking votación</h1>
    <div class="rank">
    <?php
        $i = 1;
        foreach($jugadores as $jugador){
        echo "<p>$i º " . $jugador['jugador'] ." ( ".$jugador['numeroVotos']. " )</p><hr>";
        $i++;
        }
    ?>
    </div>
    <div>
        <form method="post" action="inicio.php">
            <button name="inicio">Inicio</button>
        </form>
    </div>

</body>
</html>