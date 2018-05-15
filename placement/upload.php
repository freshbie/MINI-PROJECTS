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

$num_of_rows=$_POST["nor"];

?>
<html>
    <head>
        <title> Upload Questions </title>
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
                        <li><a href="predelete.php"> Delete Questions </a></li> 
                        <li><a href="tests_view.php"> Tests </a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" style="margin-top: 80px">
            <form method="get" action="insert_question.php">
                <div class="panel-group">

                    <div class="panel panel-success">
                        <div class="panel-heading text-center"> Test Number </div>
                        <div class="panel-body text-center">
                            <input type="text" name="t_no" id="t_no" required>
                        </div>
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading text-center"> Test Name </div>
                        <div class="panel-body text-center">
                            <input type="text" name="t_name" id="t_name" required>
                        </div>
                    </div>

                    <?php 
                    for($i=1;$i<=$num_of_rows;$i++)
                    {
                    ?>

                    <div class="panel panel-primary">
                        <div class="panel-heading">Question <?php echo $i ?></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <textarea rows="4" cols="50" style="resize:vertical;max-height: 200px;min-height: 100px" class="form-control" required name="qq<?php echo $i ?>"></textarea>
                                </div>
                                <div class="col-xs-6">
                                    <div class="row">
                                        <div class="col-xs-6"><input type="radio" name="q<?php echo $i ?>" value="a" checked><input name="q<?php echo $i ?>a" type="text" class="form-control" required></div>
                                        <div class="col-xs-6"><input type="radio" name="q<?php echo $i ?>" value="b"><input name="q<?php echo $i ?>b" type="text" class="form-control" required></div>
                                        <div class="col-xs-6"><input type="radio" name="q<?php echo $i ?>" value="c"><input name="q<?php echo $i ?>c" type="text" class="form-control" required></div>
                                        <div class="col-xs-6"><input type="radio" name="q<?php echo $i ?>" value="d"><input name="q<?php echo $i ?>d" type="text" class="form-control" required></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-block btn-lg pull-right btn-primary" value="Update"/>
                    </div>
                    <input type="hidden" name="no_rows" id="no_rows" value="<?php echo $num_of_rows ?>">
                </div>
            </form>
        </div>
    </body>
</html>