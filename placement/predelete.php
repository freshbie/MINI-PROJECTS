<?php

include("config.php");
include("session.php");

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

?>
<html>
    <head>
        <title> Delete Questions </title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
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
    </head>
    <body>	
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
                        <li><a href="signup.php"> Signup </a></li>
                        <li><a href="prereport.php"> Report </a></li> 
                        <li><a href="preupload.php"> Upload Questions </a></li>
                        <li><a href="#"> Delete Questions </a></li> 
                        <li><a href="tests_view.php"> Tests </a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <form method="post" action="delete.php">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading"> Test Number </div>
                        <div class="panel-body">
                            <input type="text" name="tno" id="tno" required>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" value="Submit" class="btn btn-primary btn-lg">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>