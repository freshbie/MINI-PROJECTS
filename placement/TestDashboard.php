<?php
include("config.php");
include("session.php"); 

$t_id=$_POST["tno"];
$sql = "SELECT * FROM quiz_question WHERE testno = '$t_id'";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);

$sql2 = "SELECT * FROM login WHERE username = '$t_id'";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$type2=$row2["type"];
if($type2==1)
{
    session_destroy();
    header("location: index.php");
}

?>
<html>
    <head>
        <title>Test Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <noscript>
            <style type="text/css">
                body {display:none;}
            </style>
        </noscript>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        
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
            #log{
                border-radius: 15px;
                background: white;
                margin-left:400px;
                margin-right: 800px;
                width:680px;
            }
            #list1{
                font-size:16px;
                font-family:Arial;
            }
            #heading{
                font-size:18px;
                font-family:Arial; 
            }
            input[type=submit] {
                background-color: white;
                width:10%;
                height:10%;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                color: black;
                font-weight: bold;
            }

            input[type=submit]:hover {
                background-color: black;
                color:white;
                font-weight: bold;
            }
        </style>
    </head>
    <body style="background: url(maths.jpg) no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;
                 color:white;">
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
                        <img class="img-rounded img-responsive" src="msec.png" style="max-width: 100%; background: white;margin-left: 350px">
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br>
        
        <div id="heading">
            <h1>General Instructions</h1>
        </div>
        <div id="list1"> 
            <ul>
                <li>This session has <?php echo $count ?> Questions.</li>
                <li>Duration of the test is 1 hour.</li>
                <li>Cut/Copy/Paste is restricted.</li>
                <li>Reloading the page, resets the progress of the test.</li>
                <li>Opening a new tab/ Minimizing the window is considered as malpractice.</li>
                <li>Test Progress will be submitted automatically once test duration gets over.</li>
            </ul>

        </div>
        <div id="heading">
            <center><h1>Best Of Luck!!!</h1></center>
        </div>
        <br><br>
        <form action="quiz.php" method="post">
            <input type="hidden" name="tid" id="tid" value="<?php echo $t_id ?>">
            <input type="submit" value="Start">
        </form>
    </body>
</html>
