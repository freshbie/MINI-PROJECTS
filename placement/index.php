<?php

include("config.php");
session_start();
// define variables and set to empty values
$nameErr = $passErr = "";
$name = $error = $pass= "";
$num=0;

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["username"])) 
    {
        $nameErr = "Username is required";
    } 
    else 
    {
        $name = test_input($_POST["username"]);
        if (!filter_var($name, FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "Invalid email format"; 
        }
    }
    if (empty($_POST["password"])) 
    {
        $passErr = "password is required";
    } 
    else 
    {
        $pass = test_input($_POST["password"]);
    }   



    $sql = "SELECT * FROM login WHERE username = '$name' and password = '$pass'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) 
    {
        $_SESSION["usname"] = $name;
        $num=$row["type"];
        if($num==0)
            header("location: pretestdashboard.php ");
        else header("location: signup.php");
    }
    else 
    {
        echo "<script> alert('Wrong Username or Password') </script>";
        session_destroy();
    }

}
?>

<html>
    <head>
        <title> Aptitude Test </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <noscript>
            <style type="text/css">
                body {display:none;}
            </style>
        </noscript>
        <style>
            html
            {
                background: url(back.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;

            }
            body {font-family: Arial, Helvetica, sans-serif;}
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;

            }
            img.avatar {
                height: 150px;
                width: 30%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }
            #log{
                background: white;
                margin-left:400px;
                margin-right: 800px;
                width:700px;
            }
            #container {
                position: fixed;
                width: 340px;
                height: 280px;
                top: 50%;
                left: 50%;
                margin-top: -140px;
                margin-left: -170px;
                background: #fff;
                border-radius: 3px;
                border: 1px solid #ccc;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .1);

            }
            form {
                margin: 0 auto;
                margin-top: 20px;
            }
            label {
                color: #555;
                display: inline-block;
                margin-left: 18px;
                padding-top: 10px;
                font-size: 14px;
            }
            p a {
                font-size: 11px;
                color: #aaa;
                float: right;
                margin-top: -13px;
                margin-right: 20px;
                -webkit-transition: all .4s ease;
                -moz-transition: all .4s ease;
                transition: all .4s ease;
            }
            p a:hover {
                color: #555;
            }
            input {
                font-family: "Helvetica Neue", Helvetica, sans-serif;
                font-size: 12px;
                outline: none;
            }
            input[type=text],
            input[type=password] {
                color: #777;
                padding-left: 10px;
                margin: 10px;
                margin-top: 12px;
                margin-left: 18px;
                width: 290px;
                height: 35px;
                border: 1px solid #c7d0d2;
                border-radius: 2px;
                box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;
                -webkit-transition: all .4s ease;
                -moz-transition: all .4s ease;
                transition: all .4s ease;
            }
            input[type=text]:hover,
            input[type=password]:hover {
                border: 1px solid #b6bfc0;
                box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .7), 0 0 0 5px #f5f7f8;
            }
            input[type=text]:focus,
            input[type=password]:focus {
                border: 1px solid #a8c9e4;
                box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #e6f2f9;
            }
            #lower {
                background: #ecf2f5;
                width: 100%;
                height: 69px;
                margin-top: 20px;
                box-shadow: inset 0 1px 1px #fff;
                border-top: 1px solid #ccc;
                border-bottom-right-radius: 3px;
                border-bottom-left-radius: 3px;
            }
            input[type=checkbox] {
                margin-left: 20px;
                margin-top: 30px;
            }
            .check {
                margin-left: 3px;
                font-size: 11px;
                color: #444;
                text-shadow: 0 1px 0 #fff;
            }
            input[type=submit] {
                float: right;
                margin-right: 20px;
                margin-top: 20px;
                width: 80px;
                height: 30px;
                font-size: 14px;
                font-weight: bold;
                color: #fff;
                background-color: #acd6ef; /*IE fallback*/
                background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8));
                background-image: -moz-linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
                background-image: linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
                border-radius: 30px;
                border: 1px solid #66add6;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
                cursor: pointer;
            }
            input[type=submit]:hover {
                background-image: -webkit-gradient(linear, left top, left bottom, from(#b6e2ff), to(#6ec2e8));
                background-image: -moz-linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
                background-image: linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
            }
            input[type=submit]:active {
                background-image: -webkit-gradient(linear, left top, left bottom, from(#6ec2e8), to(#b6e2ff));
                background-image: -moz-linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
                background-image: linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
            }
        </style>
    </head>
    <body>

        <div id="log"> 
            <center><img src="msec.png"></center>
        </div>
        <div id="container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onSubmit="return validate(this);" name="form">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="email ID"><span class="error"><?php echo $nameErr;?></span>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Register Number"><span class="error"><?php echo $passErr;?></span>
                <div id="lower">
                    <!--<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>-->
                    <input type="submit" value="Login">
                </div>
                <div style = "font-size:30px; color:#cc0000; margin-top:10px; background: white"><?php echo $error; ?></div>
            </form>
        </div>
        <script type="text/javascript">
            var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
            var re = /^[0-9]+$/;
            function validate(form)
            {
                var email = form.username.value;
                var pass = form.password.value;
                var errors = [];
                if (!ck_email.test(email))
                {
                    errors[errors.length] = "Enter a Valid User Name";
                }
                if (!re.test(pass)) 
                {
                    errors[errors.length] = "Enter a Valid Password";
                }
                if (errors.length > 0) {

                    reportErrors(errors);
                    return false;
                }
                return true;
            }
            function reportErrors(errors)
            {
                var msg = "Please Enter Valid Data...\n";
                for (var i = 0; i<errors.length; i++) {
                    var numError = i + 1;
                    msg += "\n" + numError + ". " + errors[i];
                }
                alert(msg);
            }
        </script>
    </body>
</html>