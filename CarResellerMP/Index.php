<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "Navbar.php"; ?>
        
    <?php 
    
    
    require_once 'DbConn.php';                     //making connection
    $obj = new DbConn();

    $conn = $obj->connect();

    $sql ="SELECT * FROM car WHERE Status != 'Sold'";
    
    $result = $conn->query($sql);
    
    
    ?>
    <div class="container">
        <div class="cover">
            <input type="text">
            <input type="button" value="search">

        </div>

        <div class="main-content">
            <h2 style="text-align: center; margin: 10px;">Available Cars</h2>
            <div class="car-view">


            <?php 
            
            
                while ($row = $result->fetch_assoc()){
                    echo '<div class="item">';
                    echo '<a href="productDetails.php?id=' .$row["CarId"] . '">';
                    echo '<img src="img/Product/' . $row["CarId"] . '.jpg" alt="">';
                    echo '<h2>' . $row["Name"] .  '</h2>';
                    echo '<h2>' . $row["Price"] . '</h2>';
                    echo '</a>';
                    echo '</div>';
                }
            
            
            ?>
               
               

            </div>

        </div>


    </div>
    

    <?php include "Footer.php"; ?>


    
</body>
</html>