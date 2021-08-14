


<?php 

    session_start();

    if(isset($_POST["btnLogout"])){
        session_unset();

        session_destroy();

        echo("<script> window.location.href = '/CarReSellerMP/'; </script>");
    }





?>


<div class="NavBar">
        <div class="logo">
            <h2>Car Reseller MP</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="Index.php">Home</a></li>
                <li><a href="RequestToSell">Sell</a></li>
                <li><a href="#">About-Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign-Up</a></li>
                <li><a href="ContactUs.php">Contact-Us</a></li>
                
                
               
                <?php

                    if(isset($_SESSION["User"])){
                ?>
                    
                    <li>Welcome:  <?php echo $_SESSION["User"]["Name"] ?>
                        <form action="Navbar.php" method="POST">
                            <input type="submit" name="btnLogout" value="Logout">
                        </form>
                    
                    
                    </li>   

                <?php
                    }
                ?>
                
                
                
            </ul>

        </div>

</div>