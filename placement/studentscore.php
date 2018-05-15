<?php
include("config.php");

$co=array();
$cans=0;
$wans=0;
$cheat=$_POST["cheat"];

$t_id=$_POST["t_id"];
$sql = "SELECT * FROM quiz_question WHERE testno = '$t_id'";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);

session_start();
$_SESSION["usname"]=$t_id;

$sql2 = "SELECT * FROM login WHERE username = '$t_id'";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$type2=$row2["type"];
if($type2==1)
{
    session_destroy();
    header("location: index.php");
}
$sql2 = "SELECT * FROM login WHERE username = '$t_id'";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$type2=$row2["type"];
if($type2==1)
{
    session_destroy();
    header("index.php");
}

for($i=1;$i<=$count;$i++)
{
    $sql = "SELECT coption FROM quiz_question WHERE no = $i AND testno='$t_id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $co[$i]=$row["coption"];
}

$givenans=array();

for($i=1;$i<=$count;$i++)
{
    $name="q".$i;
	if(!isset($_POST[$name]) || $_POST[$name] == false)
		$givenans[$i] = 'e';
	else $givenans[$i] = $_POST[$name];
}

for($i=1;$i<=$count;$i++)
{
    if($givenans[$i]==$co[$i])
    {
        $cans++;
    }
    else $wans++;
}

$nm=$_POST["c_name"];
$reg=$_POST["c_reg"];
$dpt=$_POST["c_dept"];

$sql = "SELECT * FROM stureport WHERE regno = '$reg' AND testno='$t_id'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count2 = mysqli_num_rows($result);

if($count2 == 1)
{
    echo "<script> alert('You can take the test only once'); </script>";
    $cans=$row["cans"];
    $wans=$count-$cans;
}
else
{

    $sql = "INSERT INTO stureport(name,regno, dept, cans, testno) VALUES ('$nm','$reg', '$dpt', '$cans', '$t_id');";
    mysqli_query($db,$sql);
}

?>
<html>
    <head>
        <title> Score </title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet'>
        <noscript>
            <style type="text/css">
                body {display:none;}
            </style>
        </noscript>
        <style>
            #log{
                background-color:white;
                border-radius:4px;
                width: 700px !important;
                margin-left:-350px !important;
                margin-right:-350px !important;
                top:25%;
                height: 50px;
                opacity:1;
            }
            h1{
                text-align:center;
                font-family:'Cinzel' !important;
                font-size:32px;
                color:white !important;
            }
            div {
                height: 400px;
                width: 400px;
                background:url(gre.jpg) center no-repeat fixed;
                color:white;
                position: fixed;
                top: 50%;
                left: 50%;
                margin-top: -145px;
                margin-left: -200px;
            }
            #lio
            {
                height: 100px !important;
                width:200px !important;
                position:fixed !important;
                top:3% !important;
                left:88% !important;
            }
            #po {
                height: 100px;
                width: 250px;
                color:white;
                position: fixed;
                top: 50%;
                left: 50%;
                margin-top: -50px;
                margin-left: -100px;
            }
            body{
                background: url(green.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            button[type=submit]
            {
                background-color: white;
                border: none;
                color: black;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                transition-duration: 0.4s;
                position:fixed !important;
                top:3% !important;
                left:88% !important;
            }
            button[type=submit]:hover
            {
                background-color: red;
                color: white;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            }
        </style>
        <link href='https://fonts.googleapis.com/css?family=BioRhyme Expanded' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font-awesome.min.css">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="jquery-3.2.1.slim.min.js"></script>
        <script src="popper.min.js"></script>
        <link rel="stylesheet" href="w3.css">


    </head>
    <body>
        <div id=log>
            <img src="msec.png" style="max-width: 100%;">
        </div>
        <br><br>
        <br><br><br>
        <h1>YOUR SCORE IS !!!</h1>
        <div>
            <div id=po>
                <h3>
                    <?php echo"Correct Answer : ".$cans ?>
                    <?php echo"Wrong Answer : ".$wans ?>
                    <?php echo"Cheated : ".$cheat ?>
                </h3>
                <form action='answers.php' method="post">
                    <input type="hidden" value="<?php echo $t_id ?>" name="tid" id="tid">
                    <input type='hidden' name='entans' id="entans" value="<?php echo htmlentities(serialize($givenans)); ?>" />
                    <input type="submit" class="btn btn-block btn-lg btn-danger" value="View Answers">
                </form>
            </div>
        </div>
        <div id=lio>
            <form action="logout.php">
                <button type="submit" class="btn"><i class="fa fa-sign-out">LOGOUT</i></button>
            </form>
        </div>

    </body>
</html>
