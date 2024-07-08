<?php
require_once('classes/CRUD.php');
$crud = new CRUD;
$select = $crud->select('automobile', 'name');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile list</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Automobile</h1>


    <div class="list">
        <?php
        foreach ($select as $row) {
        ?>

            <ul>
                <lh>
                    <h3><?= $row['name']; ?></h3>
                </lh>
                <li><strong>Serial number : </strong><?= $row['serial_number']; ?></li>
                <li><strong>Year of production : </strong><?= $row['year']; ?></li>
                <li><strong>Drive train : </strong><?= $row['drive_train']; ?></li>
                <li><strong>Category : </strong><?= $row['category']; ?></li>
                <li><strong>Type : </strong><?= $row['type']; ?></li>
                <li><strong>Description : </strong><?= $row['description']; ?></li>
                <li><strong>Cost : </strong><?= $row['cost']; ?> $</li>
            </ul>
        <?php
        }
        ?>
    </div>
    <div>
        <a href="client-index.php" class="btn">Client Index</a>
    </div>
</body>

</html>