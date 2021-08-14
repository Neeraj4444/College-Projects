<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">

    <style>
        input{
            background-color: rgb(126, 166, 240);
    color: #fff;
    transition: all 0.4s;
    border-radius: 10px;
    padding: 10px;
    font-size: 20px;
    border-radius: 5px;
        }

        input[type="submit"]:hover{ 
    background-color: #fff;
    color:blue;
    border-color: blue;
    cursor:pointer; 

}


    </style>
</head>
<body>
<?php include "Navbar.php"; ?>

<?php 
    
    
    
    require_once 'DbConn.php';                     //making connection
    $obj = new DbConn();

    $conn = $obj->connect();

     if(isset($_GET["id"])){
         $_SESSION["Car"] = $_GET["id"];

     }

     $carId = $_SESSION["Car"];

    $sql ="SELECT * FROM car WHERE CarId = $carId";
    
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    
    if(isset($_GET["btnBooking"])){
        $customerId = $_SESSION["User"]["CustomerId"];
        $carId = $_SESSION["Car"];

        $bookingDate = date("d/m/Y");

        $sql ="INSERT INTO booking(CarId, UserId, Date) VALUES ($carId,$customerId,'$bookingDate')";

        if($conn->query($sql)){
            echo "<script> alert ('Booked successfully!!'); </script>";
            unset($_SESSION["Car"]);
            echo "<script> window.location.href='/CarResellerMP/'; </script>"; 
        }
    }


    
?>

    <div class="container">
      <h1 style="text-align: center; margin-top: 10px;">Product Details</h1>
      <hr><hr>
        <div class="productDetails-main">
            <div class="productImage">
            <?php
             echo '<img src="img/Product/' . $row["CarId"] . '.jpg" alt="">';
             ?>
            </div>
            <div class="productDetail">
                <h2><?php echo $row["Name"] ?></h2>
                <h3>Model : <?php echo $row["Model"] ?></h3>
                <h3>Engine : <?php echo $row["Engine"] ?></h3>
                <h3>Price : <?php echo $row["Price"] ?></h3>
                <h3>Fuel : <?php echo $row["FuelType"] ?></h3>
                
               <form action="productDetails.php" method="GET">
                    <input type="submit" name="btnBooking"  value="Book Now">
                </form> 


            </div>


        </div>
        <hr><hr>
        <div class="productDetail-other">
            <h3>Description: </h3>
            <p><?php echo $row["Description"] ?></p>
                <div class="gap-10"></div>
           <h3>Expert Comment: </h3>
           <p><?php echo $row["ExpertView"] ?></p>
        </div>
        <div class="gap-10"></div>
        
    </div>

    <?php include "Footer.php"; ?>
</body>
</html>
