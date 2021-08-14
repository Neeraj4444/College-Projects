<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Master</title>

    <link rel="stylesheet" href="main.css">
    <!-- include the style -->
<link rel="stylesheet" href="css/alertify.css" />
<!-- include a theme -->
<link rel="stylesheet" href="css/themes/bootstrap.css" />
<script src="alertify.js"></script>
</head>
<body>
    <?php include "adminNavbar.php"; ?>

    

    <div class="container">
        <div class="admin-wrapper">
           <?php include "adminSidebar.php"; ?> 

           <?php 

            $cityId = "";
            $cityName = "";
            $state= "";
            
            $updateMode = false;
                                    //use to change in update mode
    
            require_once 'DbConn.php';                     //making connection

            $obj = new DbConn();

            $conn = $obj->connect();

            $sql = "select * from city order by CityId";

            $result = $conn->query($sql);

            if (isset($_GET["btnSubmit"])){
                $cityName = $_GET["txtCityName"];
                $state = $_GET["txtCityState"];

                $sql1 = "INSERT INTO city(Name, State) VALUES ('$cityName','$state')";

                

                if($conn->query($sql1))
                {
                    echo "<script> alertify.success('Data insert successfully !!!') </script>";

                    echo "<script> window.location.href = '/CarResellerMP/CityMaster.php' </script>";
                }else{
                    echo "<script> alertify.error('Error Saving Data !!!') </script>";
                }
            }


            if(isset($_GET["edit"])){  
                $updateMode = true;                                
                                             //here we fetch cityId from edit btn from below's edit button
                $editId = $_GET["edit"];
                
                $sql = "select * from City where CityId= $editId";

                $editResult = $conn->query($sql);

                $editRow = $editResult->fetch_assoc();   //fetch_assoc get the single row of cityId in form of array

                $cityId = $editRow["CityId"];
                $cityName = $editRow["Name"];
                $state = $editRow["State"];

            }

            if(isset($_GET["btnUpdate"]))
            {
                $cityId = $_GET["txtCityId"];
                $cityName = $_GET["txtCityName"];
                $state = $_GET["txtCityState"];

                

                $sql = "UPDATE city SET Name='$cityName',State='$state' WHERE CityId= $cityId";

                if($conn->query($sql)){
                   // echo "<script> alert ('updated successfully!!'); </script>";
                    echo "<script> window.location.href='/CarResellerMP/CityMaster.php'; </script>";  //to reload the page
                }
            }

            if(isset($_GET["del"])){
                $cityId = $_GET["del"];

                $sql = "DELETE FROM city WHERE CityId = $cityId";

                if($conn->query($sql)){
                    echo "<script> window.location.href='/CarResellerMP/CityMaster.php'; </script>"; 
                }
            }

            ?>



            <div class="admin-mainContent">
                <h1>City Master</h1>
                   
                <div class="admin-form">

                <form action="CityMaster.php" method="GET">

                    <div class="form-row">
                        <label>City id:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCityId" enabled ="false" class="form-element" value="<?php echo $cityId; ?>" readonly >
                    </div>
                    
                

                    <div class="form-row">
                        <label>City Name:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCityName" enabled ="false" class="form-element"  value="<?php echo $cityName; ?>">
                    </div>
    
                    <div class="form-row">
                        <label>State:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCityState" enabled ="false" class="form-element"  value="<?php echo $state; ?>">
                    </div>
    
                    <div class="form-row text-center">
                        <?php if($updateMode == false ): ?>
                        <input type="submit" name="btnSubmit" class="button-hover" value="Save">
                        <?php else: ?>
                            <input type="submit" name="btnUpdate" class="button-hover" value="Update">
                        <?php endif ?>
                        <input type="reset" onclick="reload" name="btnReset" class="button-hover">
                    </div>
                   
                    
                    
                 </form>
                    
                </div>

                <div class="admin-table">
                    <table>
                        <tr>
                            <th>City Id</th>
                            <th>Name</th>
                            <th>State</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php 
                        
                            while($row = $result->fetch_assoc()){   //fetch_assoc get the data in  the form of array that we are showing 
                                echo "<tr>";                         //in table
                                    echo "<td>";
                                        echo $row["CityId"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo $row["Name"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo $row["State"];

                                    echo "</td>";


                                    echo "<td>";
                                        echo "<a href= /CarResellerMP/CityMaster.php?edit=". $row["CityId"] . "> Edit </a>";
                                        //here we are making edit button in which cityId is stored so that we can use that cityId through edit button
                                        //cityId go into URL
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<a href=javascript:del(" . $row["CityId"] . ")>Delete</a>";
                                        //here we call del function in javascript in this way
                                        //here we are making delete button in which cityId is stored so that we can use that cityId through delete button
                                        //cityId go into URL
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

    
    
   <script>
   
       function reload(){
         window.location.href='/CarResellerMP/CityMaster.php';
       }

       function del(id){
           if(confirm("Are you sure want to delete the record"));

           window.location.href="/CarResellerMP/CityMaster.php?del=" + id;
       }
   
   </script>


</body>
</html>