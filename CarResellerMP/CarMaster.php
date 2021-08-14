<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Master</title>

    <link rel="stylesheet" href="main.css">
    <!-- include the style -->
<link rel="stylesheet" href="css/alertify.css" />
<!-- include a theme -->
<link rel="stylesheet" href="css/themes/bootstrap.css" />

</head>
<body>
    <?php include "adminNavbar.php"; ?>

    <?php 
    
        require_once 'DbConn.php';                     //making connection
        $obj = new DbConn();

        $conn = $obj->connect();

        $carId = "";
        $name = "";
        $model = "";
        $description = "";
        $engine = "";
        $price = "";
        $milage = "";
        $fuel = "";
        $expertView = "";
        $status = "";

        $updateMode = false;

        $sql = "select * from car";

        $result = $conn->query($sql);

        if (isset($_POST["btnSubmit"])) {
            $name = $_POST["txtName"];
            $model = $_POST["txtModel"];
            $description = $_POST["txtDescription"];
            $engine = $_POST["txtEngine"];
            $price = $_POST["txtPrice"];
            $milage = $_POST["txtMilage"];
            $fuel = $_POST["txtFuelType"];
            $expertView = $_POST["txtExpertView"];
            $status = $_POST["ddlStatus"];
    
            $sql = "INSERT INTO car(Name, Model, Description, Engine, Price, Mileage, FuelType, ExpertView, Status) VALUES ('$name','$model','$description','$engine','$price','$milage','$fuel','$expertView','$status')";
    
            if ($conn->query($sql)) {
    
                if ($_FILES["fldcarImage"]["name"]) {
    
                    $sql1 = "select max(CarId) as CarId from car";
                    $result = $conn->query($sql1);
    
                    $row = $result->fetch_assoc();
    
                    $idNew = $row["CarId"];
    
                    $targetDirectory = "img/Product/";
    
                    $ext = pathinfo($_FILES["fldcarImage"]["name"], PATHINFO_EXTENSION);
    
                    if ($ext != "jpg") {
                        echo "<script> alert ('Use only JPG files !!') </script>";
                        die;
                    }
    
                    $targetLocation = $targetDirectory . $idNew . "." . $ext;
    
                    try {
                        move_uploaded_file($_FILES["fldcarImage"]["tmp_name"], $targetLocation);
                        clearstatcache();
                    } catch (Throwable $th) {
                        echo "<script> alert('" . $th . "') </script>";
                    }
                }
    
                echo "<script> window.location.href='/CarResellerMP/CarMaster.php'; </script>";
            }
        }


        if (isset($_GET["edit"])) {

            //echo "<script> alert('inside edit') </script>";

            $updateMode =true;
    
            $carId = $_GET["edit"];
    
            $sql = "select * from car where CarId = $carId ";
    
            $result = $conn->query($sql);
    
            $row = $result->fetch_assoc();
    
            //print_r($row);
    
            $name = $row["Name"];
            $model = $row["Model"];
            $description = $row["Description"];
            $engine = $row["Engine"];
            $price = $row["Price"];
            $milage = $row["Mileage"];
            $fuel = $row["FuelType"];
            $expertView = $row["ExpertView"];
            $status = $row["Status"];
        }


        if (isset($_POST["btnUpdate"])){
            $carId = $_POST["txtCarId"];
            $name = $_POST["txtName"];
            $model = $_POST["txtModel"];
            $description = $_POST["txtDescription"];
            $engine = $_POST["txtEngine"];
            $price = $_POST["txtPrice"];
            $milage = $_POST["txtMilage"];
            $fuel = $_POST["txtFuelType"];
            $expertView = $_POST["txtExpertView"];
            $status = $_POST["ddlStatus"];

            $sql = "UPDATE car SET Name='$name',Model='$model',Description='$description',Engine='$engine',Price=$price,Mileage='$milage', FuelType='$fuel', ExpertView='$expertView',Status='$status' WHERE CarId = $carId";
            
            if($conn->query($sql)){
                if ($_FILES["fldcarImage"]["name"]) {
    
                    
    
                    $idNew = $carId;
    
                    $targetDirectory = "img/Product/";
    
                    $ext = pathinfo($_FILES["fldcarImage"]["name"], PATHINFO_EXTENSION);
    
                    if ($ext != "jpg") {
                        echo "<script> alert ('Use only JPG files !!') </script>";
                        die;
                    }
    
                    $targetLocation = $targetDirectory . $idNew . "." . $ext;
    
                    try {
                        move_uploaded_file($_FILES["fldcarImage"]["tmp_name"], $targetLocation);
                        clearstatcache();
                    } catch (Throwable $th) {
                        echo "<script> alert('" . $th . "') </script>";
                    }
                }

                echo "<script> window.location.href='/CarResellerMP/CarMaster.php'; </script>";
            }
        }

        if(isset($_GET["del"])){
            $carId = $_GET["del"];
    
            $sql = "DELETE FROM car WHERE CarId = $carId";
    
                if($conn->query($sql)){
                        echo "<script> window.location.href='/CarResellerMP/CarMaster.php'; </script>"; 
                    }
                }
        
    
    
    
    
    ?>

    <div class="container">
        <div class="admin-wrapper">
        <?php include "adminSidebar.php"; ?> 



            <div class="admin-mainContent">
                <h1>Car Master</h1>

              <form action="CarMaster.php" method="POST" enctype="multipart/form-data">
                <div style="display: flex;">

                
                    <div class="admin-form">
                        <div class="form-row">
                            <label>Car Id:</label><br>        <!--we create diff row-->
                            <input type="text" name="txtCarId" enabled ="false" class="form-element" value="<?php echo $carId; ?>" readonly >
                    </div>
    
                        <div class="form-row">
                            <label>Name :</label><br>        <!--we create diff row-->
                            <input type="text" name="txtName" value="<?php echo $name; ?>"  class="form-element">
                        </div>
        
                        <div class="form-row">
                            <label>Model :</label><br>        <!--we create diff row-->
                            <input type="text" name="txtModel" value="<?php echo $model ?>"  class="form-element">
                        </div>
    
                        <div class="form-row">
                            <label>Description :</label><br>        <!--we create diff row-->
                            <textarea name="txtDescription"  class="form-element"><?php echo $description?> </textarea>
                        </div>
                        <div class="form-row">
                            <label>Engine:</label><br>        <!--we create diff row-->
                            <input type="text" name="txtEngine"  value="<?php echo $engine; ?>"  class="form-element">
                        </div>
                       
                        
                        
                        <div class="form-row">
                            <label>Price:</label><br>        <!--we create diff row-->
                            <input type="text" name="txtPrice" value="<?php echo $price; ?>"  class="form-element">
                        </div>
                        
    
                        
    
                        <div class="form-row">
                            <label>Milage:</label><br>        <!--we create diff row-->
                            <input type="text" name="txtMilage" value="<?php echo $milage; ?>"  class="form-element">
                        </div>
    
                        <div class="form-row">
                            <label>Fuel Type:</label><br>        <!--we create diff row-->
                            <input type="text" name="txtFuelType" value="<?php echo $fuel; ?>"  class="form-element">
                        </div>
    
                        <div class="form-row">
                            <label>Expert View:</label><br>        <!--we create diff row-->
                            <textarea name="txtExpertView" class="form-element"><?php echo $expertView; ?></textarea>
                        </div>
    
                        
    
                       
    
                        <div class="form-row">
                            <label>Status:</label><br>        <!--we create diff row-->
                            <select name="ddlStatus" value="<?php echo $status; ?>"  class="form-element">
                                    <option value="Available">Available</option>
                                    <option value="Booked">Booked</option>
                                    <option value="Sold">Sold</option>
                            </select>
                        </div>
    
        
                        <div class="form-row text-center">
                        <?php if($updateMode == false ): ?>
                            <input type="submit" name="btnSubmit" class="button-hover" value="Save">
                        <?php else: ?>
                            <input type="submit" name="btnUpdate" class="button-hover" value="Update">
                        <?php endif ?>
                            <input type="reset" onclick="reload()" name="btnReset" class="button-hover">
                        </div>
                </div>
                <div class="signup-image">
                    <div class="car-image">
                            <img src="<?php echo "img/Product/" . $carId . ".jpg"; ?>"   alt="" width="100%">
                    </div>
                    <div class="gap-10"></div>
                    <input type="file" name="fldcarImage">
                </div>

                </form>
                </div>

               

                <div class="admin-table">
                    <table>
                        <tr>
                            <th>Car Id</th>
                            <th>Name</th>
                           
                            <th>Model</th>
                            
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        while($row = $result->fetch_assoc()){   //fetch_assoc get the data in  the form of array that we are showing 
                                echo "<tr>";                         //in table
                                    echo "<td>";
                                        echo $row["CarId"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo $row["Name"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo $row["Model"];

                                    echo "</td>";


                                    echo "<td>";
                                        echo $row["Price"];

                                    echo "</td>";





                                    echo "<td>";
                                        echo "<a href= /CarResellerMP/CarMaster.php?edit=". $row["CarId"] . "> Edit </a>";
                                        //here we are making edit button in which customerId is stored so that we can use that customerId through edit button
                                        //customerId go into URL
                                     echo "</td>";

                                     echo "<td>";
                                     echo "<a href=javascript:del(" . $row["CarId"] . ")>Delete</a>";
                                     //here we call del function in javascript in this way
                                     //here we are making delete button in which customerId is stored so that we can use that customerId through delete button
                                     //customerId go into URL
                                    echo "</td>";
                                   
                                echo "</tr>";
                            }
                        
                        
                        ?>

                       

                       
                    </table>
                    <button onclick="alertDemo()">okk</button>
                </div>

                
            </div>
        </div>

    </div>

    <?php include "Footer.php"; ?>

    <script src="alertify.js"></script>
    <script>
   
       function reload(){
         window.location.href='/CarResellerMP/CarMaster.php';
       }

       function del(id){
           if(confirm("Are you sure want to delete the record"));

           window.location.href="/CarResellerMP/CarMaster.php?del=" + id;
       }
   
   </script>
</body>
</html>