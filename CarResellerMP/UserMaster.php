<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Master</title>

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

   

    $customerId = "";
    $name = "";
    $dob = "";
    $email = "";
    $address = "";
    $city = "";
    $contactNo = "";

    $updateMode = false;

    $sql = "select * from customer";       //this part is to show db rows in our table

    $result = $conn->query($sql);

    if (isset($_POST["btnSubmit"])){       //this part is to insert in our db table through textfields
        $name = $_POST["txtName"];
        $dob = $_POST["txtDOB"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $contactNo = $_POST["txtContactNo"];

        $sql = "INSERT INTO customer( Name, Dob, Email, Address, City, ContactNo) VALUES ('$name','$dob','$email','$address','$city',$contactNo)";

        if($conn->query($sql)){
            echo "<script> window.location.href='/CarResellerMP/UserMaster.php'; </script>"; 
        }
        

    }


    if(isset($_GET["edit"])){  
        $updateMode = true;                                
                                     //here we fetch cityId from edit btn from below's edit button
        $customerId = $_GET["edit"];
        
        $sql = "select * from customer where CustomerId= $customerId";

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();   //fetch_assoc get the single row of cityId in form of array

        
        $name = $row["Name"];
        $dob = $row["Dob"];
        $email = $row["Email"];
        $address = $row["Address"];
        $city = $row["City"];
        $contactNo = $row["ContactNo"];
    }

    if(isset($_POST["btnUpdate"])){
            

        $customerId = $_POST["txtCustomerId"];
        $name = $_POST["txtName"];
        $dob = $_POST["txtDOB"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $contactNo = $_POST["txtContactNo"];


                

                $sql = "UPDATE customer SET Name='$name',Dob='$dob',Email='$email',Address='$address',City='$city',ContactNo=$contactNo WHERE CustomerId=$customerId";

                if($conn->query($sql)){
                    $updateMode = false;
                   // echo "<script> alert ('updated successfully!!'); </script>";
                    echo "<script> window.location.href='/CarResellerMP/UserMaster.php'; </script>";  //to reload the page
                }
            }

    if(isset($_GET["del"])){
        $customerId = $_GET["del"];

        $sql = "DELETE FROM customer WHERE CustomerId = $customerId";

            if($conn->query($sql)){
                    echo "<script> window.location.href='/CarResellerMP/UserMaster.php'; </script>"; 
                }
            }



?>

    <div class="container">
        <div class="admin-wrapper">
        <?php include "adminSidebar.php"; ?>



            <div class="admin-mainContent">
                <h1>User Master</h1>
            
            
            
            
            
            
           
                <div class="admin-form">

                <form action="UserMaster" method="POST">
                    <div class="form-row">
                        <label>Customer Id:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCustomerId" enabled ="false" class="form-element" value="<?php echo $customerId; ?>" readonly >
                    </div>
    
                    <div class="form-row">
                        <label>Name :</label><br>        <!--we create diff row-->
                        <input type="text" name="txtName" class="form-element" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-row">
                        <label>Date Of Birth:</label><br>        <!--we create diff row-->
                        <input type="date" name="txtDOB" class="form-element" value="<?php echo $dob; ?>">
                    </div>
                    <div class="form-row">
                        <label>Email id:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtEmail"class="form-element" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-row">
                        <label>Address :</label><br>        <!--we create diff row-->
                        <textarea name="txtAddress" class="form-element" ><?php echo $address; ?></textarea>
                    </div>
                    <div class="form-row">
                        <label>City:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCity" class="form-element" value="<?php echo $city; ?>">
                    </div>
                    <div class="form-row">
                        <label>Contact No.</label><br>        <!--we create diff row-->
                        <input type="text" name="txtContactNo" class="form-element" value="<?php echo $contactNo; ?>">
                    </div>
    
                    <div class="form-row text-center">
                        <?php if($updateMode == false ): ?>
                            <input type="submit" name="btnSubmit" class="button-hover" value="Save">
                        <?php else: ?>
                            <input type="submit" name="btnUpdate" class="button-hover" value="Update">
                        <?php endif ?>
                        <input type="reset" name="btnReset" onclick="reload()" class="button-hover">
                    </div>



                    </form>
                </div>

                <div class="admin-table">
                    <table>
                        <tr>
                            <th>Customer Id</th>
                            <th>Name</th>
                           
                            <th>City</th>
                            <th>Contact no</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        
                        <?php 
                        
                            while($row = $result->fetch_assoc()){   //fetch_assoc get the data in  the form of array that we are showing 
                                echo "<tr>";                         //in table
                                    echo "<td>";
                                        echo $row["CustomerId"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo $row["Name"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo $row["City"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo $row["ContactNo"];

                                    echo "</td>";

                                    echo "<td>";
                                        echo "<a href= /CarResellerMP/UserMaster.php?edit=". $row["CustomerId"] . "> Edit </a>";
                                        //here we are making edit button in which customerId is stored so that we can use that customerId through edit button
                                        //customerId go into URL
                                     echo "</td>";

                                     echo "<td>";
                                     echo "<a href=javascript:del(" . $row["CustomerId"] . ")>Delete</a>";
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

    <script>
   
       function reload(){
         window.location.href='/CarResellerMP/UserMaster.php';
       }

       function del(id){
           if(confirm("Are you sure want to delete the record"));

           window.location.href="/CarResellerMP/UserMaster.php?del=" + id;
       }
   
   </script>
</body>
</html>