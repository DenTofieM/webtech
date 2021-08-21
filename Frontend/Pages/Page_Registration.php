<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="../CSS/Style_Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{
            background-image: url("../Asset/Login-cover.gif");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <section class="registration-section">
        <div class="form-part">
            <h3 class="system-register">Registration</h3>
            <div class="photo">
                <img src="../Asset/demo.png">
            </div>
            <form action="#" enctype="multipart/form-data">
                <div>
                    <i class="fa fa-user"></i>
                    <input type="text" name="user_name" placeholder="Enter Your Name " required>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="user_email" placeholder="Enter Your Email " required>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <input type="text" name="user_phone" placeholder="Enter your Contact number  " required>
                </div>

                <div class="user_img">
                    <i class="fa fa-camera"></i>
                    <input id="user_image" type="file" name="user_image">
                </div>

                <div>
                    <i class="fa fa-lock"></i>
                    <input type="password" name="user_password" placeholder="Enter Your Password " required>
                </div>

                <div>
                    <i class="fa fa-lock"></i>
                    <input type="password" name="user_con_password" placeholder="Confirm Password " required>
                </div>

                <center><button type="submit" class="login-btn submit-btn"> Submit </button></center>
            </form>

            <section>
                <p>I have already an account!!!<a href="Page_Login.php"> Login</a></p>
            </section>

            <div class="message-box">
            </div>
        </div>
    </section>

    <script src="../JS/Register.js"></script>
</body>
</html>