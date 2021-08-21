<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../CSS/Style_Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="login-section">
        <div class="form-part">
            <h3 class="system-login">System Login</h3>
            <form action="#">
                <div>
                    <i class="fa fa-user"></i>
                    <input type="text" name="user_id" placeholder="Enter Your User Name / ID " required>
                </div>

                <div>
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Enter Your Password " required>
                </div>

                <center><button type="submit" class="login-btn"> Login </button></center>
            </form>

            <section>
            You have no account!!!<a href="Page_Registration.php"> Registration</a>
            </section>

            <div class="message-box">
            </div>
        </div>
    </section>

    <script src="../JS/Login.js"></script>
</body>
</html>