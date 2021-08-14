<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUs</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include "Navbar.php"; ?>

    <div class="container">
        <div class="contactUsWrapper"> <!--we want this div flex (line by line)-->
            <div class="contactUsMap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14731.51289787599!2d75.79485738533023!3d22.621022163687048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962f958dcb7169d%3A0xd877c12078e50f0f!2sMedi-Caps%20University!5e0!3m2!1sen!2sin!4v1624968671270!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contactUsAddress">
                <h2>Address</h2>
                <hr>
                <h3>Indore</h3>
                <h3>Lorem ipsum dolor sit amet consectetur adhfhnfjnkjk fbjbsdcsdbb bjbdhbb.</h3>
                <h3>Bhopal</h3>
                <h3>Lorem ipsum dolor sit amet consectetur adhfhnfjnkjk fbjbsdcsdbb bjbdhbb.</h3>
            </div>
        </div>

        <div class="contactUsForm">
            <h2>Write To Us</h2>
            <p>If you have any query,please fill form,our executive will contact you</p>

            <div class="form-row">
                <label>Name :</label><br>        <!--we create diff row-->
                <input type="text" name="txtName" class="form-element">
            </div>

            <div class="form-row">
                <label>Message :</label><br>        <!--we create diff row-->
                <textarea name="message" class="form-element"></textarea>
            </div>

            <div class="form-row text-center">
                <input type="submit" name="btnSubmit" class="button-hover">
                <input type="reset" name="btnReset" class="button-hover">
            </div>
        </div>
    </div>

    <?php include 'Footer.php'; ?>
    
</body>
</html>