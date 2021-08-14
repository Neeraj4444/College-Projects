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

    <div class="container">

       <div class="Selling-heading">
        <h1>Sell Your Car</h1>
        <div class="gap-10"></div>
        <p>Please fill this form to provide the details about your car.Our company executive will call you for further procedure</p>
        <div class="gap-10"></div>

        <hr><hr>
       </div>

        <div class="signup-wrapper">
            
            <div class="signup-main">
                
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
            </div>

            <div class="signup-image">
                <div class="car-image">

                </div>
                <div class="gap-10"></div>
                <input type="file" name="fldcarImage">
            </div>
        </div>

        
    </div>
    <?php include "Footer.php"; ?>
</body>
</html>