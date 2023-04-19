<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabliczka mnożenia</title>
    <link rel="stylesheet" href="./scss/style.css" />
</head>
<body>

    <div class="content">
        <form class="input-list" action="index.php" method="get">
            <input class="input-first" type="number" name="size">
            <input class="input-second" type="submit" value="OK">
        </form>

    <?php

        require ('function.php');

        if(isset($_GET['size']))
        {          
            $tabSize = $_GET['size'];
            $multiplicationTable = multiplicationTable($tabSize);

            if ($multiplicationTable === null) {
                exit();
            }

            $json = json_encode($multiplicationTable);
            $json = explode(',', $json);

            echo "<table>";

            for ($height = 1; $height <= $tabSize; $height++) {
                echo "<tr>";
                
                    for ($width = 1; $width <= 10; $width++) {
                        echo "<td>";
                        echo $width * $height;
                        echo "</td>";
                    }

                echo "</tr>";
            }
            echo "</table>";
        }

    ?>
</div>
</body>
</html>



