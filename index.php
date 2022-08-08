<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpetual-calendar</title>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Press Start 2P', 'DotGothic16', '微軟正黑體';
            cursor: url(./img/sword.png), auto;
        }

        .main {
            background-image: url(./img/home.png);
            width: 100%;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .box {
            margin: auto;
        }
    </style>
</head>

<body class="main" onselectstart="return false" onload="currentTime()">

    <div class="box">
        <?php
        include_once "./calendar.php";
        ?>
    </div>
<script src="./main.js"></script>
</body>

</html>