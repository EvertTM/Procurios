<?php 
    require_once('classes.php');
    require_once('functions.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gastenboek</title>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>


    <h2>Gastenboek</h2>
    
    <form action="" method="post">
        Voeg bericht toe: <input type="text" name="messageContent">
        <input type="submit" value="Toevoegen">
    </form>

    <?php
        checkButtons();
        printMessageBlocks();
    ?>

    <?php if (isset($_SESSION["msgBlocks"]) && sizeof($_SESSION["msgBlocks"]) > 0): ?>
        <a class="cleanPage" href="cleanPage.php">De bezem erdoor!</a>
    <?php endif ?>
    

</body>

</html>