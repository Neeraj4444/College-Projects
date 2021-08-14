<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selling Request</title>

    <link rel="stylesheet" href="main.css">
    <!-- include the style -->
<link rel="stylesheet" href="css/alertify.css" />
<!-- include a theme -->
<link rel="stylesheet" href="css/themes/bootstrap.css" />

</head>
<body>
<?php include "adminNavbar.php"; ?>

    <div class="container">
        <div class="admin-wrapper">
        <?php include "adminSidebar.php"; ?>



            <div class="admin-mainContent">
                <h1>Selling Request</h1>

                <div class="admin-form">
                    <div class="form-row">
                        <label>Request Id:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtRequestId"  class="form-element">
                    </div>
    
                    

                    <div class="form-row">
                        <label>Car Name :</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCarName" class="form-element">
                    </div>

                    <div class="form-row">
                        <label> Description:</label><br>        <!--we create diff row-->
                        
                        <textarea name="txtDescription" class="form-element"></textarea>
                    </div>

                    <div class="form-row">
                        <label>Model Year:</label><br>        <!--we create diff row-->
                        <input type="date" name="txtModel" class="form-element">
                    </div>

                    <div class="form-row">
                        <label>Customer Id:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCustomerId"class="form-element">
                    </div>
                    <div class="form-row">
                        <label>Customer Name:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtCustomerName"class="form-element">
                    </div>
                    <div class="form-row">
                        <label>Expected Price:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtExpectedPrice" class="form-element">
                    </div>
                    <div class="form-row">
                        <label>Engine:</label><br>        <!--we create diff row-->
                        <input type="text" name="txtEngine" class="form-element">
                    </div>
                    
    
                    <div class="form-row text-center">
                        <input type="submit" name="btnSubmit" class="button-hover">
                        <input type="reset" name="btnReset" class="button-hover">
                    </div>
                </div>  

                
                <div class="admin-table">
                    <table>
                        <tr>
                            <th>Request Id</th>
                            <th>Car Name</th>
                           
                            <th>Customer Name</th>
                            <th>Expected Price</th>
                            
                        
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>xyz</td>
                            <td>Indore</td>
                            <td>8585u06xxx</td>
                            <td><a href="#">Edit</a></td>
                            <td><a href="#">Delete</a></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>ghf</td>
                            <td>khandwa</td>
                            <td>6666xxxx</td>
                            <td><a href="#">Edit</a></td>
                            <td><a href="#">Delete</a></td>
                        </tr>

                       
                    </table>
                    <button onclick="alertDemo()">okk</button>
                </div>

                
            </div>
        </div>

    </div>

    <?php include "Footer.php"; ?>

    <script src="alertify.js"></script>
    <script>
        function alertDemo(){
            alertify.confirm('Confirm Message', function(){ alertify.success('Ok') }, function(){ alertify.error('Cancel')});
 
        }
    </script>
</body>
</html>