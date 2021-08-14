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

if (isset($_POST["btnSubmit"])){
    require 'DBConn.php';

    $obj = new DbConn();

    $conn = $obj->connect();

    $email = $_POST["txtLoginId"];
    $pwd = $_POST["txtPassword"];

    $sql = "select * from customer where Email='$email' and Password='$pwd'";

    $result = $conn->query($sql);

    if($result->num_rows == 0){

        

        echo("<script> alertify.error('Invalid Username or Password') </script>");
    }else{

        $row = $result->fetch_assoc();
        session_start();

        $_SESSION["User"] = $row;
        echo("<script> window.location.href = '/CarReSellerMP/'; </script>");
    }

}

?>

    <div class="container">
        <div class="login-main">
            <h1>Customer Login</h1>

            <form action="login.php" method="POST">

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