<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="main.css">
    <?php include "alertify.php" ?>
</head>

<?php 

if (isset($_POST["btnSubmit"])){
    require 'DBConn.php';

    $obj = new DbConn();

    $conn = $obj->connect();

    $userId = $_POST["txtLoginId"];
    $pwd = $_POST["txtPassword"];

    $sql = "select * from admin where AdminId=$userId and Password='$pwd'";

    $result = $conn->query($sql);

    if($result->num_rows == 0){
        echo("<script> alertify.error('Invalid Username or Password') </script>");
    }else{
        echo("<script> window.location.href = '/CarReSellerMP/CarMaster.php'; </script>");
    }

}

?>


<body>
    

<?php include "Navbar.php"; ?>

    <div class="container">
        <div class="login-main">
            <h1>Administrator Login</h1>
            <form action="AdminLogin.php" method="POST">
            <div class="form-row">
                <label>Login id:</label><br>        <!--we create diff row-->
                <input type="text" name="txtLoginId">
            </div>

            <div class="form-row">
                <label>Password:</label><br>        <!--we create diff row-->
                <input type="password" name="txtPassword">
            </div>

            <div class="form-row text-center">
                <input type="submit" name="btnSubmit" class="button-hover">
                <input type="reset" name="btnReset" class="button-hover">
            </div>
            
            
            </form>
           
        </div>
    </div>

    <div class="gap-10"></div>
    <?php include "Footer.php"; ?>
</body>
</html>