<?php

include("config.php");
include("session.php");
$nameErr = $regErr = $dobErr = $deptErr = $mailErr = "";
$name = $reg = $dob = $dept = $email= "";

$s_id=$_SESSION["usname"];
$sql2 = "SELECT * FROM login WHERE username = '$s_id'";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$type2=$row2["type"];
if($type2==0)
{
    session_destroy();
    header("location: index.php");
}


function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["name"])) 
    {
        $nameErr = "Name is required";
    } 
    else 
    {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["reg"])) 
    {
        $regErr = "Name is required";
    } 
    else 
    {
        $reg = test_input($_POST["reg"]);
    }

    if (empty($_POST["dob"])) 
    {
        $dobErr = "DOB is required";
    } 
    else 
    {
        $dob = test_input($_POST["dob"]);
    }

    if (empty($_POST["dept"])) 
    {
        $deptErr = "Department is required";
    } 
    else 
    {
        $dept = test_input($_POST["dept"]);
    }  

    if(empty($_POST["mail"]))
    {
        $mailErr = "Email ID required";
    }
    else
    {
        $email = test_input($_POST["mail"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $mailErr = "Invalid email format"; 
        }
    }

    $sql = "INSERT INTO students(name, register, DOB, department, mail) VALUES ('$name', '$reg', '$dob', '$dept', '$email');";
    $sql2 = "INSERT INTO login(username, password, type) VALUES ('$email', '$reg', 0);";

    if(mysqli_query($db,$sql)&&(mysqli_query($db,$sql2)))
    {
        $nameErr = $regErr = $dobErr = $deptErr = $mailErr = "";
        $name = $reg = $dob = $dept = $email= "";
        echo "<script> alert('Student Inserted');</script>";
    }
    else echo "<script> alert('Student could not be Inserted');</script>";
}
?>
<html>
    <head>
        <title> Add Student </title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link href='https://fonts.googleapis.com/css?family=BioRhyme Expanded' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <noscript>
            <style type="text/css">
                body {display:none;}
            </style>
        </noscript>
        
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="jquery-3.2.1.slim.min.js"></script>
        <script src="popper.min.js"></script>
        <link rel="stylesheet" href="w3.css">

        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />

        <style>
            body {font-family:'Convergence';
                font-size: 16px;}

            input[type=text],[type=password], select {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: blue;
                width:10%;
                height:10%;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: green;
            }

            .container1 {
                border-radius: 5px;
                background-color: #f2f2f2;
                white-space: initial;
                padding: 20px;
                opacity:0.9;
            }
            h3{
                text-align:center;
                font-family:'Convergence';
                color:inherit;

            }
            #log{
                background: white;
                margin-left:330px;
                margin-right:200px;
                width:700px;
            }
        </style>
    </head>
    <body style="background: url(back1.jpg) no-repeat center fixed;
                 -webkit-background-size: cover;
                 -moz-background-size: cover;
                 -o-background-size: cover;
                 background-size: cover;">

        <nav class="navbar navbar-inverse" style="margin-bottom:0px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar2">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navBar2">
                    <center>
                        <img class="img-rounded img-responsive" src="msec.png" style=" background: white;">
                    </center>
                </div>
            </div>
        </nav>
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navBar">

                    <ul class="nav navbar-nav">
                        <li><a href="#"> Signup </a></li>
                        <li><a href="prereport.php"> Report </a></li> 
                        <li><a href="preupload.php"> Upload Questions </a></li> 
                        <li><a href="predelete.php"> Delete Questions </a></li> 
                        <li><a href="tests_view.php"> Tests </a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <br><br>
        <div class="container1">
            <h3 >STUDENT REGISTRATION FORM</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onSubmit="return validate(this);" name="form">
                <label for="name">NAME</label>
                <input type="text" name="name" >

                <label for="reg">REGISTER NUMBER</label>
                <input type="text" name="reg" >

                <label for="dob">DOB</label><br>
                <input type="text" name="dob" ><br>

                <label for="dept">DEPARTMENT</label>
                <select id="dept" name="dept">

                    <option selected>Choose Your Department</option>
                    <option value="CSE">CSE</option>
                    <option value="CE">CE</option>
                    <option value="ECE-A">ECE A</option>
                    <option value="ECE-B">ECE B</option>
                    <option value="EEE">EEE</option>
                    <option value="IT">IT</option>
                    <option value="MECH">MECH</option>
                </select>

                <label for="email">EMAIL</label>
                <input type="text" name="mail" >

                <center><input type="submit" value="Submit"></center>
            </form>
        </div>
        <script type="text/javascript">
            var ck_name = /^[A-Za-z0-9 .]{3,40}$/;
            var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
            var reg_no=/^[0-9]+$/;
            var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
            function validate(form){
                var name = form.name.value;
                var reg1=form.reg.value;
                var email = form.mail.value;
                var dob1 = form.dob.value;
                var dep=form.dept.value;
                var errors = [];

                if (!ck_name.test(name)) {
                    errors[errors.length] = "Enter a Valid Name";
                }
                if(!reg_no.test(reg1))
                {
                    errors[errors.length] = "Enter a Valid Register Number"; 
                }
                if (!ck_email.test(email)) {
                    errors[errors.length] = "Enter a Valid Email Address";
                }
                if (!re.test(dob1)) {
                    errors[errors.length] = "Enter Date of Birth";
                }
                if(dep==='Choose Your Department')
                {
                    errors[errors.length] = "Select Department";
                }
                if (errors.length > 0) {

                    reportErrors(errors);
                    return false;
                }
                return true;
            }
            function reportErrors(errors){
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

