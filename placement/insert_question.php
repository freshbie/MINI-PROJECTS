<?php

include("config.php");

$question = $op1 = $op2 = $op3 = $op4 = $cop = "";

$i = 1;
if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
    $no_of_questions=$_GET["no_rows"];
    $tno=$_GET["t_no"];
    $tname=$_GET["t_name"];
    
    for($i=1;$i<=$no_of_questions;$i++)
    {
        $question=$_GET["qq".(string)$i];
        $op1=$_GET["q".(string)$i."a"];
        $op2=$_GET["q".(string)$i."b"];  
        $op3=$_GET["q".(string)$i."c"];  
        $op4=$_GET["q".(string)$i."d"];  
        $cop=$_GET["q".(string)$i];

        $sql = "INSERT INTO quiz_question(no,question, option1, option2, option3, option4, coption, testno, testname, visible) VALUES ($i,'$question', '$op1', '$op2', '$op3', '$op4','$cop','$tno','$tname',1);";

        if(mysqli_query($db,$sql))
        {
            $question = $op1 = $op2 = $op3 = $op4 = $cop = "";
        }
    }
    echo "<script>
alert('Questions Inserted');
window.location.href='preupload.php';
</script>";
}
?>
