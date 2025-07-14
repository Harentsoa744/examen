<?php
include "connexion.php";
include "fonction.php";
$emp_no = $_GET['numero'];
$dept_no = $_GET['dept'];
$date = $_GET['date_debut'];
$todate = $_GET['date_fin'];
$sql = "UPDATE employees SET hire_date = '$date';";
$sqldel = "DELETE FROM dept_emp WHERE emp_no = '$emp_no' AND dept_no = '$dept_no';";
$sql2 = "INSERT dept_emp VALUE('$emp_no','$dept_no','$date','$todate');";
$sql3 = "UPDATE current_dept_emp SET dept_no = '$dept_no', from_date = '$date' , to_date = '$todate' WHERE emp_no = '$emp_no';";
$sql4 = "INSERT dept_emp_latest_date VALUE('$emp_no','$date','$todate';";
mysqli_query($conn,$sql);
mysqli_query($conn,$sqldel);
mysqli_query($conn,$sql2);
mysqli_query($conn,$sql3);
mysqli_query($conn,$sql4);
$Location = "Location:index.php?p=fiche&dept=<?=$dept_no;?>&numero=<?=$emp_no;?>";
header($Location);
?>