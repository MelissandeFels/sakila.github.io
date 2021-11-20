<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>SAKILA</title>
    <style>
        
        /*Background of body*/
        body {
            background-color:#061a40;
        }
        .form_login {
            background:white;
            width:50%;
            height:50%;
            margin:10% auto;
            padding:50px;
            border-radius:15px
        }
        /*Banner effect*/
        .title {
            background-color: #fff;
            color:#f1faee;
            text-shadow: 2px 2px 4px #000000;
            background-image: linear-gradient(rgba(37, 37, 37, 0.6), rgba(255, 255, 0, 0.5)), url("https://www.macommune.info/wp-content/uploads/2019/12/www.macommune.info-les-films-a-ne-pas-manquer-avec-les-enfants-pendant-les-vacances-de-noel-aux-cinemas-megarama-a-beaux-arts-et-ecole-valentin-cinema-noel-2019-940x600.jpg");
            padding-top:40vh;
            padding-bottom:30vh;
            font-size:80px;
        }
        /*Effects on card*/
        .film-title {
            font-size: 20px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            color:rgb(11, 128, 27);
        }
        .film-name {
            font-size: 16px;
            font-family: 'Open Sans Condensed', sans-serif;
        }
        .film-rental {
            font-size: 20px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            color:rgb(211, 181, 11);
        }
        .search {
            background-color:rgb(11, 128, 27);
            color:#fffffc;
            font-family:'Open Sans Condensed',sans-serif;
        }
        .search:hover {
            color:#000;
            border-radius:5px;
            background-color:#f5bb00;
        }

    </style>
</head>

<body>