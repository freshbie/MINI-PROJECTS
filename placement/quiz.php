<?php
include("session.php");
include("config.php");

$qu=array();
$o1=array();
$o2=array();
$o3=array();
$o4=array();


$t_id=$_POST["tid"];
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

for($i=1;$i<=$count;$i++)
{
    $sql = "SELECT * FROM quiz_question WHERE no = $i AND testno='$t_id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $qu[$i]=$row["question"];
    $o1[$i]=$row["option1"];
    $o2[$i]=$row["option2"];
    $o3[$i]=$row["option3"];
    $o4[$i]=$row["option4"];

}
?>
<?php
$name=$_SESSION["usname"];

$sql = "SELECT * FROM students WHERE mail = '$name'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$nm=$row["name"];
$reg=$row["register"];
$dpt=$row["department"];

?>

<html>
    <head>
        <title> TEST </title>
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

        <script src="clock.js"></script>
        <script src="prevention.js"></script>

        <link rel="stylesheet" href="clock_style.css">

        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />

        <style>
            button.scroll{
                padding: 0;
                border: none;
                background: none;
                cursor:pointer;
            }

            a.step {
                background: #cccccc;
                border-radius: 1.8em;
                -moz-border-radius: 1.8em;
                -webkit-border-radius: 1.8em;
                color: #ffffff;
                display: inline-block;
                line-height: 2.5em;
                margin-right: 5px;
                text-align: center;
                width: 2.5em;
            }
        </style>
        <script>
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
            }
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }
        </script>
        <script>
            function cpy_val()
            {
                var i;
                var ea=0,ba=0;

                for(i=1;i<=<?php echo $count ?>;i++)
                {
                    if(ans[i]==0)
                        ba++;
                    else ea++;
                }
                document.getElementById("q_ans").value=ea;
                document.getElementById("q_blank").value=ba;
            }
        </script>
        <script>
            window.onbeforeunload = function() {

                <?php session_destroy() ?>
                return "Are you sure ?";
            }
        </script>

        <script>
            function alloff()
            {
                var j;
                for(j=2;j<=<?php echo $count ?>;j++)
                {
                    var cid="q"+j+"area";
                    document.getElementById(cid).style.display="none";
                }
            }
            function toggle(i)
            {
                var cur_id="q"+i+"area";

                var j;
                for(j=1;j<=<?php echo $count ?>;j++)
                {
                    var cid="q"+j+"area";
                    document.getElementById(cid).style.display="none";
                }
                document.getElementById(cur_id).style.display="block";

            }
        </script>

        <script>

            var answer=0;
            var notans=<?php echo $count ?>;
            var review=0;

            var rev=[];
            var ans=[];

            for(i=0;i<=<?php echo $count+1 ?>;i++)
            {
                rev[i]=0;
                ans[i]=0;
            }

            document.getElementById("answered").innerHTML = answer;
            document.getElementById("not_answered").innerHTML = notans;
            document.getElementById("review_marked").innerHTML = review;

            function disp()
            {
                document.getElementById("rev").innerHTML = review;
                document.getElementById("ans").innerHTML = answer;
                document.getElementById("nans").innerHTML = notans;
            }

            function mark_review(id)
            {
                document.getElementById('qc_'+id).style.background = "#5bc0de";
                if(rev[id]==0)
                {
                    rev[id]=1;
                    review++;
                }
                document.getElementById("rev").innerHTML = review;
            }

            function unreview(id)
            {
                if(rev[id]==1)
                {
                    review--;
                    rev[id]=0;
                    if(ans[id]!=0)
                    {
                        document.getElementById('qc_'+id).style.background = "green";
                    }
                    else document.getElementById('qc_'+id).style.background = "#cccccc";
                }
                document.getElementById("rev").innerHTML = review;
            }

            function clear_ans(id)
            {
                document.getElementById('q'+id+'a').checked=false;
                document.getElementById('q'+id+'b').checked=false;
                document.getElementById('q'+id+'c').checked=false;
                document.getElementById('q'+id+'d').checked=false;
                if(rev[id]==0)
                    document.getElementById('qc_'+id).style.background = "#cccccc";
                else document.getElementById('qc_'+id).style.background = "#5bc0de";

                if(ans[id]==1)
                {
                    ans[id]=0;
                    answer--;
                    notans++;
                }
                document.getElementById("ans").innerHTML = answer;
                document.getElementById("nans").innerHTML = notans;
            }

            function radioclick(id) {
                if(rev[id]==0)
                    document.getElementById('qc_'+id).style.background = "green";
                if(ans[id]==0)
                {
                    ans[id]=1;
                    answer++;
                    notans--;
                }
                document.getElementById("ans").innerHTML = answer;
                document.getElementById("nans").innerHTML = notans;
            }

        </script>

        <script>
            function load()
            {
                disp();
                alloff();
            }
        </script>
    </head>
    <body onload="load()">
        <div style="padding: 5px 0 0 5px; height: 100px; width: 150px;position:fixed;right:0;top:0">
            <div id="clockdiv">

                <div>
                    <span class="minutes"></span>
                    <div class="smalltext">Minutes</div>
                </div>
                <div>
                    <span class="seconds"></span>
                    <div class="smalltext">Seconds</div>
                </div>
            </div>
        </div>

        <script>
            initializeClock('clockdiv', deadline);
        </script>

        <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:25%;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <center>
                <a href="javascript:void(0)" class="w3-large"><img src="msec.png" style="width:100%;" ></a>
            </center>
            <hr/>

            <?php
    for($i=1;$i<=$count;$i++)
    {
        if($i%4==0)
            echo "<br><br>"
            ?>

            <div class="col-sm-3">
                <button class="scroll"><a class="step" href="#q<?php echo $i ?>area" id="qc_<?php echo $i ?>" onclick="toggle('<?php echo $i ?>')"><?php echo $i ?></a></button>
            </div>

            <?php

    }
            ?>



            <br/><br/><br/>

            <table class="table table-bordered table-responsive">
                <tr class="btn-success">
                    <td>Answered: </td>
                    <td><div id="ans"></div></td>
                </tr>
                <tr class="btn-Danger">
                    <td>Not Answered: </td>
                    <td><div id="nans"></div></td>
                </tr>
                <tr class="btn-info">
                    <td>Marked for Review: </td>
                    <td><div id="rev"></div></td>
                </tr>
            </table>
        </div>
        <div class="w3-main" style="margin-left:30%;margin-right: 5%">
            <button class="w3-button w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
            <br/>
            <form class="form-inline" id="qf" action="studentscore.php" method="post">
                <div class="panel-group">

                    <div class="row " id="q1area" style="margin-bottom: 20px">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Question 1</div>
                            <div class="panel-body">
                                <textarea rows="8" cols="93"style="resize:vertical;min-height: 100px" class="form-control" readonly><?php echo"$qu[1]" ?></textarea>
                            </div>
                            <div class="panel-footer">
                                <input id="q1a" type="radio" name="q1" value="a" onclick="radioclick('1')">&nbsp;<label for="q1a"><?php echo"$o1[1]" ?>&nbsp;</label><br/>
                                <input id="q1b" type="radio" name="q1" value="b" onclick="radioclick('1')">&nbsp;<label for="q1b"><?PHP echo"$o2[1]" ?>&nbsp;</label><br/>
                                <input id="q1c" type="radio" name="q1" value="c" onclick="radioclick('1')">&nbsp;<label for="q1c"><?PHP echo"$o3[1]" ?>&nbsp;</label><br/>
                                <input id="q1d" type="radio" name="q1" value="d" onclick="radioclick('1')">&nbsp;<label for="q1d"><?PHP echo"$o4[1]" ?>&nbsp;</label><br/>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-lg btn-info pull-left" value="Mark for Review" onclick="mark_review('1')">
                                <input type="button" class="btn btn-lg btn-info pull-right" value="UnMark" onclick="unreview('1')">
                                <center>
                                    <input type="button" class="btn btn-lg btn-warning" value="Clear Answer" onclick="clear_ans ('1')">
                                </center>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-lg btn-primary pull-right" value="Next" onclick="toggle('2')">
                            </div>
                        </div>
                    </div>

                    <?php
    for($i=2;$i<$count;$i++)
    {
                    ?>

                    <div class="row" id="q<?php echo $i ?>area" style="margin-bottom: 20px">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Question <?php echo $i ?></div>
                            <div class="panel-body">
                                <textarea rows="8" cols="93" style="resize:vertical;min-height: 100px" class="form-control" readonly><?php echo"$qu[$i]"?></textarea>
                            </div>
                            <div class="panel-footer">
                                <input id="q<?php echo $i ?>a" type="radio" name="q<?php echo $i ?>" value="a" onclick="radioclick('<?php echo $i ?>')">&nbsp;<label for="q<?php echo $i ?>a"><?php echo"$o1[$i]" ?>&nbsp;</label><br/>
                                <input id="q<?php echo $i ?>b" type="radio" name="q<?php echo $i ?>" value="b" onclick="radioclick('<?php echo $i ?>')">&nbsp;<label for="q<?php echo $i ?>b"><?php echo"$o2[$i]" ?>&nbsp;</label><br/>
                                <input id="q<?php echo $i ?>c" type="radio" name="q<?php echo $i ?>" value="c" onclick="radioclick('<?php echo $i ?>')">&nbsp;<label for="q<?php echo $i ?>c"><?php echo"$o3[$i]" ?>&nbsp;</label><br/>
                                <input id="q<?php echo $i ?>d" type="radio" name="q<?php echo $i ?>" value="d" onclick="radioclick('<?php echo $i ?>')">&nbsp;<label for="q<?php echo $i ?>d"><?php echo"$o4[$i]" ?>&nbsp;</label><br/>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-lg btn-info pull-left" value="Mark for Review" onclick="mark_review('<?php echo $i ?>')">
                                <input type="button" class="btn btn-lg btn-info pull-right" value="UnMark" onclick="unreview('<?php echo $i ?>')">
                                <center>
                                    <input type="button" class="btn btn-lg btn-warning" value="Clear Answer" onclick="clear_ans ('<?php echo $i ?>')">
                                </center>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-lg btn-primary pull-left" value="Previous" onclick="toggle('<?php echo $i-1 ?>')">
                                <input type="button" class="btn btn-lg btn-primary pull-right" value="Next" onclick="toggle('<?php echo $i+1 ?>')">
                            </div>
                        </div>
                    </div>

                    <?php
    }
                    ?>
                    <div class="row" id="q<?php echo $count ?>area" style="margin-bottom: 20px">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Question <?php echo $count ?></div>
                            <div class="panel-body">
                                <textarea rows="8" cols="93" style="resize:vertical;min-height: 100px" class="form-control" readonly><?php echo"$qu[$count]"?></textarea>
                            </div>
                            <div class="panel-footer">
                                <input id="q<?php echo $count ?>a" type="radio" name="q<?php echo $count ?>" value="a" onclick="radioclick('<?php echo $count ?>')">&nbsp;<label for="q<?php echo $count ?>a"><?php echo"$o1[$count]" ?>&nbsp;</label><br/>
                                <input id="q<?php echo $count ?>b" type="radio" name="q<?php echo $count ?>" value="b" onclick="radioclick('<?php echo $count ?>')">&nbsp;<label for="q<?php echo $count ?>b"><?php echo"$o2[$count]" ?>&nbsp;</label><br/>
                                <input id="q<?php echo $count ?>c" type="radio" name="q<?php echo $count ?>" value="c" onclick="radioclick('<?php echo $count ?>')">&nbsp;<label for="q<?php echo $count ?>c"><?php echo"$o3[$count]" ?>&nbsp;</label><br/>
                                <input id="q<?php echo $count ?>d" type="radio" name="q<?php echo $count ?>" value="d" onclick="radioclick('<?php echo $count ?>')">&nbsp;<label for="q<?php echo $count ?>d"><?php echo"$o4[$count]" ?>&nbsp;</label><br/>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-lg btn-info pull-left" value="Mark for Review" onclick="mark_review('<?php echo $count ?>')">
                                <input type="button" class="btn btn-lg btn-info pull-right" value="UnMark" onclick="unreview('<?php echo $count ?>')">
                                <center>
                                    <input type="button" class="btn btn-lg btn-warning" value="Clear Answer" onclick="clear_ans ('<?php echo $count ?>')">
                                </center>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-lg btn-primary pull-left" value="Previous" onclick="toggle('<?php echo $count-1 ?>')">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-lg btn-block btn-success" value="Submit" id="sub" onclick="cpy_val()">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="cheat" name="cheat" value="0">
                <input type="hidden" id="q_ans" name="q_ans" value="0">
                <input type="hidden" id="q_blank" name="q_blank" value="0">
                <input type="hidden" id="c_name" name="c_name" value="<?php echo $nm ?>">
                <input type="hidden" id="c_dept" name="c_dept" value="<?php echo $dpt ?>">
                <input type="hidden" id="c_reg" name="c_reg" value="<?php echo $reg ?>">
                <input type="hidden" id="t_id" name="t_id" value="<?php echo $t_id ?>">
            </form>
        </div>
        <script>
            // Set the name of the hidden property and the change event for visibility
            var hidden, visibilityChange;
            if (typeof document.hidden !== "undefined") { // Opera 12.10 and Firefox 18 and later support
                hidden = "hidden";
                visibilityChange = "visibilitychange";
            } else if (typeof document.msHidden !== "undefined") {
                hidden = "msHidden";
                visibilityChange = "msvisibilitychange";
            } else if (typeof document.webkitHidden !== "undefined") {
                hidden = "webkitHidden";
                visibilityChange = "webkitvisibilitychange";
            }
            var cheatval = document.getElementById("cheat").value;
            // If the page is hidden, increase cheatval;
            function handleVisibilityChange() {
                if (document[hidden]) {
                    document.getElementById("cheat").value = ++cheatval;
                    alert("You are not allowed to open New Tab");
                } else {
                    //
                }
            }
            // Warn if the browser doesn't support addEventListener or the Page Visibility API
            if (typeof document.addEventListener === "undefined" || typeof document[hidden] === "undefined") {
                alert("This Test requires a browser, such as Google Chrome or Firefox, that supports the Page Visibility API to monitor your activity.");
            } else {
                // Handle page visibility change
                document.addEventListener(visibilityChange, handleVisibilityChange, false);

            }
        </script>
    </body>
</html>
