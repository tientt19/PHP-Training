<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    $characterName = 'Tien';
    $characterAge = 23;

    echo strtoupper($characterName);
    echo '</br>';
    echo strlen($characterName);
    echo '</br>';
    echo '</br>';
    echo substr($characterName, 3, 1);
    echo "<h1>My site $characterName</h1>";
    echo '<hr>';
    echo "<p>This is my site $characterAge</p>";
    echo '<p>This is my site</p>';
    echo "<p>This is my site $characterAge</p>";
    echo "<p>This is my site $characterAge</p>";
    echo "<p>This is my site $characterAge</p>";
    echo "<p>This is my site $characterAge</p>";
    echo '<p>This is my site</p>';
    echo '<p>This is my site</p>';
    echo '<p>This is my site</p>';
    echo $characterName;
    echo '</br>';
    echo $characterAge;
    echo '</br>';
    echo abs(-1000);

    ?>
    <hr>
    <br>
    <form action="site.php" method="get">
        Name: <input type="text" name="Names">
        <input type="Submit" name="" id="">
    </form>
    <br>
</body>

</html>
