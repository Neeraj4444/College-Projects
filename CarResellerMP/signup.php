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
    
    if(isset($_POST["btnSubmit"])){
    require_once 'DbConn.php';                     //making connection
    $obj = new DbConn();

    $conn = $obj->connect();

        $name = $_POST["txtName"];
        $dob = $_POST["txtDOB"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $contactNo = $_POST["txtContactNo"];
        $password = $_POST["txtPassword"];
    
        $sql = "INSERT INTO customer( Name, Dob, Email, Address, City, ContactNo,Password) VALUES ('$name','$dob','$email','$address','$city',$contactNo,'$password')";
    
        if($conn->query($sql)){
            echo "<script> alert ('User registration successfull !!') </script>";
            echo "<script> window.location.href='/CarResellerMP/'; </script>"; 
        }
    }
    
    ?>
      <div class="container">
        <div class="signup-main">
            <h1>Customer Registration</h1>

            <form action="signup.php" method="POST">
            <div class="form-row">
                <label>Name :</label><br>        <!--we create diff row-->
                <input type="text" name="txtName" class="form-element">
            </div>
            <div class="form-row">
                <label>Date Of Birth:</label><br>        <!--we create diff row-->
                <input type="date" name="txtDOB" class="form-element">
            </div>
            <div class="form-row">
                <label>Email id:</label><br>        <!--we create diff row-->
                <input type="text" name="txtEmail"class="form-element">
            </div>
            <div class="form-row">
                <label>Address :</label><br>        <!--we create diff row-->
                <textarea name="txtAddress" class="form-element"></textarea>
            </div>
            <div class="form-row">
                <label>City:</label><br>        <!--we create diff row-->
                <input type="text" name="txtCity" class="form-element">
            </div>
            <div class="form-row">
                <label>Contact No.</label><br>        <!--we create diff row-->
                <input type="text" name="txtContactNo" class="form-element">
            </div>

            <div class="form-row">
                <label>Password :</label><br>        <!--we create diff row-->
                <input type="password" name="txtPassword"class="form-element">
            </div>

            <div class="form-row">
                <label>Re-Type Password:</label><br>        <!--we create diff row-->
                <input type="password" name="txtReTypePassword"class="form-element">
            </div>

            <div class="form-row text-center">
                <input type="submit" name="btnSubmit" class="button-hover">
                <input type="reset" name="btnReset" class="button-hover">
            </div>

            </form>
        </div>
    </div>
    <?php include "Footer.php"; ?>
</body>
</html>