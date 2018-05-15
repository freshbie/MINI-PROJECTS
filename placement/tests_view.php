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

$i=1;

?>

<?php
$sqlcheck = "SELECT * FROM quiz_question GROUP BY testno";
$resultchk = mysqli_query($db, $sqlcheck);
$count = mysqli_num_rows($resultchk);
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    for($k=1;$k<=$count;$k++)
    {
        $tno=$_POST["tn".$k];

        if(isset($_POST["cb".$k]))
        {
            $sql3 = "UPDATE quiz_question SET visible=1 WHERE testno='$tno'";
            mysqli_query($db,$sql3);
        }
        else
        {
            $sql3 = "UPDATE quiz_question SET visible=0 WHERE testno='$tno'";
            mysqli_query($db,$sql3);
        }
    }
    echo"<script> alert('Visibility Updated'); </script>";
}

?>

<html>
    <head>
        <title> Report </title>
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

        <style>
            body{
                background: url(res.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            #title{
                text-align:center;
                font-family:'Cinzel' !important;
                font-size:32px;
                color:white !important;
            }
        </style>
        <style>
            .nav-tabs{
                background-color:#f1f1f1;
            }
            .tab-content{
                background-color:white;
                padding:5px
            }
            .nav-tabs > li > a{
                border: medium none;
                background-color: #f1f1f1 !important;
            }
            .nav-tabs > li > a:hover{
                background-color: #ddd !important;
            }
            .nav-tabs > li.active > a{
                background-color: #ccc !important;
            }
        </style>

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
                        <li><a href="#"> Tests </a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row" id="title">
                TESTS REPORT
            </div>
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                                <center>
                                    <h3><strong> TESTS </strong></h3>
                                </center>
                            </div>

                            <table class='table table-hover table-responsive'>
                                <tr>
                                    <th> S.NO </th>
                                    <th> TEST NUMBER </th>
                                    <th> TEST NAME </th>
                                    <th> VISIBILITY </th>
                                </tr>
                                <?php 
                                $name = $regno = "";
                                $can=0;

                                $sql = "SELECT * FROM quiz_question GROUP BY testno";
                                $result = mysqli_query($db, $sql);
                                $count = mysqli_num_rows($result);
                                if (mysqli_num_rows($result) > 0) 
                                {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) 
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $i ;?></td>
                                    <td><input type="text" value="<?php echo $row['testno'] ;?>" name="tn<?php echo $i ?>" readonly> </td>
                                    <td><?php echo $row['testname']; ?></td>
                                    <td><input type="checkbox" value="" id="cb<?php echo $i ?>" name="cb<?php echo $i ?>" ></td>
                                </tr>
                                <?php 

                                    $vis=$row['visible'];
                                        if($vis==1)
                                        {
                                            $cid="cb".$i;
                                            echo"<script> document.getElementById('$cid').checked=true;</script>";
                                        }
                                        $i++;
                                    }
                                } 

                                ?>
                            </table>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-lg pull-right btn-danger" value="UPDATE">
                </form>
            </div>
        </div>
    </body>
</html>