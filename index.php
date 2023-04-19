<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabliczka mnożenia</title>
    <link rel="stylesheet" href="./scss/style.css" />
</head>
<body>

    <div class="content">
        <form class="input-list" action="" method="get">
            <input class="input-first" type="number" name="size">
            <input class="input-second" type="submit" value="OK">
        </form>

    <?php
        if(isset($_GET['size']))
        {
            function multiplicationTable($size) {
                if ($size < 1 || $size > 100) {
                    echo '<script>alert("Rozmiar tablicy mnożenia powinien być liczbą od 1 do 100.");</script>';
                    return null;
                }
                $mysqli = new mysqli("localhost", "root", "", "masterlease");

                if ($mysqli->connect_error) {
                die("Błąd połączenia z bazą danych: " . $mysqli->connect_error);
                }

                $key = "multiplicationTable_" . $size;

                $query = "SELECT * FROM cache WHERE wrench = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("s", $key);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $table = json_decode($row["worth"], true);
                    return $table;
                }

                $table = array();

                for ($i = 1; $i <= $size; $i++) {
                    $row = array();
                    for ($j = 1; $j <= $size; $j++) {
                        $row[] = $i * $j;
                    }
                    $table[] = $row;
                }

                $query = "INSERT INTO cache (wrench, worth) VALUES (?, ?)";
                $stmt = $mysqli->prepare($query);    
                $stmt->execute([$key, json_encode($table)]);
                $stmt->close();
                $mysqli->close();

                return $table;
            }
            
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



