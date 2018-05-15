<?php
include("config.php");
    
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $testno = $_POST["tno"];
    $sql="DELETE FROM quiz_question WHERE testno='$testno'";
}
mysqli_query($db,$sql);
echo "<script>
alert('Questions for test $testno Deleted');
window.location.href='predelete.php';
</script>";

?>