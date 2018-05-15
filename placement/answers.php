<?php

include("config.php");
include("session.php");

$tid=$_POST["tid"];
$eans = unserialize($_POST['entans']);

$sql2 = "SELECT * FROM login WHERE username = '$tid'";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$type2=$row2["type"];
if($type2==1)
{
    session_destroy();
    header("location: index.php");
}

$sql = "SELECT * FROM quiz_question WHERE testno = '$tid'";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);

for($i=1;$i<=$count;$i++)
{
    $sql = "SELECT * FROM quiz_question WHERE no = $i AND testno='$tid'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $tname=$row["testname"];

    $qu[$i]=$row["question"];
    $o1[$i]=$row["option1"];
    $o2[$i]=$row["option2"];
    $o3[$i]=$row["option3"];
    $o4[$i]=$row["option4"];
    $co[$i]=$row["coption"];

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

        <div class="container" style="margin-top: 80px">
            <div class="panel-group">
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center"> Test Number </div>
                        <div class="panel-body text-center">
                            <input type="text" name="t_no" id="t_no" value="<?php echo $tid ?>" readonly>
                        </div>
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading text-center"> Test Name </div>
                        <div class="panel-body text-center">
                            <input type="text" name="t_name" id="t_name" value="<?php echo $tname ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <ul>
                            <li> Red indicates wrong answer that was entered by user. </li>
                            <li> Green indicates correct answer. </li>
                            <li> If the question was not answered, only the correct answer is shown in green. </li>
                        </ul>
                        <br>
                    </div>
                </div>
                <?php 
    for($i=1;$i<=$count;$i++)
    {
                ?>

                <div class="row" id="q<?php echo $i ?>area" style="margin-bottom: 20px">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Question <?php echo $i ?></div>
                        <div class="panel-body">
                            <textarea rows="8" cols="93" style="resize:vertical;min-height: 100px" class="form-control" readonly><?php echo"$qu[$i]"?></textarea>
                        </div>
                        <div class="panel-footer">
                            <input id="q<?php echo $i ?>a" type="text" name="q<?php echo $i ?>" value="<?php echo $o1[$i] ?>" readonly>
                            <input id="q<?php echo $i ?>b" type="text" name="q<?php echo $i ?>" value="<?php echo $o2[$i] ?>" readonly>
                            <input id="q<?php echo $i ?>c" type="text" name="q<?php echo $i ?>" value="<?php echo $o3[$i] ?>" readonly>
                            <input id="q<?php echo $i ?>d" type="text" name="q<?php echo $i ?>" value="<?php echo $o4[$i] ?>" readonly>
                        </div>
                    </div>
                </div>

                <?php 
                    if($co[$i]==$eans[$i])
                    {
                        echo "<script> document.getElementById('q".$i.$co[$i]."').className = 'btn-success';</script>";
                    }
        else
        {
            echo "<script> document.getElementById('q".$i.$co[$i]."').className = 'btn-success';</script>";
            echo "<script> document.getElementById('q".$i.$eans[$i]."').className = 'btn-danger';</script>";
        }
    }
                ?>
            </div>
        </div>

    </body>
</html>