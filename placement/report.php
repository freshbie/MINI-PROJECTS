<?php

include("config.php");
include("session.php");

$tno=$_POST["tno"];

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

        <!--          SORT   -->
        <script>
            function sortTable(n,tbid) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById(tbid);
                switching = true;
                // Set the sorting direction to ascending:
                dir = "asc"; 
                /* Make a loop that will continue until
  no switching has been done: */
                while (switching) {
                    // Start by saying: no switching is done:
                    switching = false;
                    rows = table.getElementsByTagName("TR");
                    /* Loop through all table rows (except the
    first, which contains table headers): */
                    for (i = 1; i < (rows.length - 1); i++) {
                        // Start by saying there should be no switching:
                        shouldSwitch = false;
                        /* Get the two elements you want to compare,
      one from current row and one from the next: */
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                // If so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                // If so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        // Each time a switch is done, increase this count by 1:
                        switchcount ++; 
                    } else {
                        /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>        

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

        <div class="container">
            <div class="row" id="title">
                STUDENTS REPORT
            </div>
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">TOTAL</a></li>
                    <li><a data-toggle="tab" href="#civil">CIVIL</a></li>
                    <li><a data-toggle="tab" href="#cse">CSE</a></li>
                    <li><a data-toggle="tab" href="#ece-a">ECE A</a></li>
                    <li><a data-toggle="tab" href="#ece-b">ECE B</a></li>
                    <li><a data-toggle="tab" href="#eee">EEE</a></li>
                    <li><a data-toggle="tab" href="#it">IT</a></li>
                    <li><a data-toggle="tab" href="#mech">MECH</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> TOTAL </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reportall">
                            <tr>
                                <th onclick="sortTable(0,'reportall')"> NAME </th>
                                <th onclick="sortTable(1,'reportall')"> REGISTER NO </th>
                                <th> DEPARTMENT </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport ORDER BY cans desc";
                            else $sql =  "SELECT * FROM stureport WHERE testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['dept']; ?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>

                    <div id="civil" class="tab-pane fade">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> CIVIL </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reportcivil">
                            <tr>
                                <th onclick="sortTable(0,'reportcivil')"> NAME </th>
                                <th onclick="sortTable(1,'reportcivil')"> REGISTER NO </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport WHERE dept='CIVIL' ORDER BY cans desc";
                            else $sql = "SELECT * FROM stureport WHERE dept='CIVIL' AND testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>

                    <div id="cse" class="tab-pane fade">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> CSE </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reportcse">
                            <tr>
                                <th onclick="sortTable(0,'reportcse')"> NAME </th>
                                <th onclick="sortTable(1,'reportcse')"> REGISTER NO </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport WHERE dept='CSE' ORDER BY cans desc";
                            else $sql = "SELECT * FROM stureport WHERE dept='CSE' AND testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>

                    <div id="ece-a" class="tab-pane fade">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> ECE A </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reportecea">
                            <tr>
                                <th onclick="sortTable(0,'reportecea')"> NAME </th>
                                <th onclick="sortTable(1,'reportecea')"> REGISTER NO </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport WHERE dept='ECE-A' ORDER BY cans desc";
                            else $sql = "SELECT * FROM stureport WHERE dept='ECE-A' AND testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>

                    <div id="ece-b" class="tab-pane fade">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> ECE B </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reporteceb" >
                            <tr>
                                <th onclick="sortTable(0,'reporteceb')"> NAME </th>
                                <th onclick="sortTable(1,'reporteceb')"> REGISTER NO </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport WHERE dept='ECE-B' ORDER BY cans desc";
                            else $sql = "SELECT * FROM stureport WHERE dept='ECE-B' AND testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>

                    <div id="eee" class="tab-pane fade">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> EEE </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reporteee">
                            <tr>
                                <th onclick="sortTable(0,'reporteee')"> NAME </th>
                                <th onclick="sortTable(1,'reporteee')"> REGISTER NO </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport WHERE dept='EEE' ORDER BY cans desc";
                            else $sql = "SELECT * FROM stureport WHERE dept='EEE' AND testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>

                    <div id="it" class="tab-pane fade">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> IT </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reportit">
                            <tr>
                                <th onclick="sortTable(0,'reportit')"> NAME </th>
                                <th onclick="sortTable(1,'reportit')"> REGISTER NO </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport WHERE dept='IT' ORDER BY cans desc";
                            else $sql = "SELECT * FROM stureport WHERE dept='IT' AND testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>

                    <div id="mech" class="tab-pane fade">
                        <div class="jumbotron page-header" style="text-align: center; background-color: #ECB200;padding: 5px">
                            <center>
                                <h3><strong> MECH </strong></h3>
                            </center>
                        </div>
                        <table class='table table-hover table-responsive' id="reportmech">
                            <tr>
                                <th onclick="sortTable(0,'reportmech')"> NAME </th>
                                <th onclick="sortTable(1,'reportmech')"> REGISTER NO </th>
                                <th> SCORE </th>
                                <th> TEST NO </th>
                            </tr>
                            <?php 
                            $name = $regno = "";
                            $can=0;

                            if($tno == '*')
                                $sql = "SELECT * FROM stureport WHERE dept='MECH' ORDER BY cans desc";
                            else $sql = "SELECT * FROM stureport WHERE dept='MECH' AND testno='$tno' ORDER BY cans desc";

                            $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ;?></td>
                                <td><?php echo $row['regno'] ;?></td>
                                <td><?php echo $row['cans'] ;?></td>
                                <td><?php echo $row['testno'] ;?></td>
                            </tr>
                            <?php 
                                }
                            } 

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>