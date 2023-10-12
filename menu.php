<html>
    <head>
        <title>Menu</title>
    </head>
    <style>
        body{
            margin: 0;
            text-align: center;
        }
        .Menu{
            width: 800px;
            margin: 0 auto;
        }
        img{
            max-width: 150px;
        }
        td{
            width: 150px;
            text-align: center;
        }
    </style>
    <body>
        <div class="Menu">
            <h1>Menu</h1>
            <?php
            require_once 'database_config.php';
            $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
            // Fetch menu items from the database
            $sql = "SELECT dishname, dishprice, dishquantity FROM menu";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th width: 150px;>Photo</th><th width: 150px;>Dish Name</th><th width: 150px;>Price</th><th width: 150px;>Quantity</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='/img/" . $row["dishname"] . ".png'></td>";
                    echo "<td>" . $row["dishname"] . "</td>";
                    echo "<td>" . $row["dishprice"] . "</td>";
                    echo "<td>" . $row["dishquantity"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Sorry currently there are nothing in the menu.";
            }

            $conn->close();
            ?>
            <button><a href="landing.php">Go Back</a></button>
        </div>
    </body>
</html>