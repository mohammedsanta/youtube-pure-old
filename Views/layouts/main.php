<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>

    <?php
    
    if(isset($_SESSION['user_profile'])){
        require_once views_path() . 'partils/header.php';
    }

    ?>

    <div class="main-container">{{content}}</div>

</body>
</html>