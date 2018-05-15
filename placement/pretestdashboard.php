<?php

include("config.php");
include("session.php");

$m_id=$_SESSION["usname"];
$sql = "SELECT * FROM students WHERE mail = '$m_id'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

$name=$row["name"];

$sql2 = "SELECT * FROM login WHERE username = '$m_id'";
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
        <title> Dashboard </title>
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

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div style="font-size: 20px; font-family: fantasy"> WELCOME <?php echo $name ?> </div> <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <?php 

                    $sql =  "SELECT * FROM quiz_question WHERE visible=1 GROUP BY testno";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) 
                    {
                        // output data of each row : 
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                    ?>
                    <form method="post" action="TestDashboard.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">Test <?php echo $row["testno"] ?></div>
                            <div class="panel-body text-center">
                                <div class="row">
                                    <?php echo $row["testname"] ?>
                                </div>
                                <input type="hidden" name="tno" id="tno" value="<?php echo $row['testno'] ?>" >
                            </div>
                            <div class="panel-footer"> <input type="submit" class="btn btn-block btn-danger" value="Take Test" > </div>
                        </div>
                    </form>
                    <?php 
                        }
                    } 

                    ?>

                </div>
            </div>
        </div>

    </body>
</html>