<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Students</title>
    <?php
$con = mysqli_connect("localhost","root","","studentdb");
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
<style>
    table {
        border-collapse:collapse;
    }
table, td,th {
    border:solid 1pt black;
    padding:5px;
}
th{
    background-color:#e3e3e3;
}
    </style>

</head>
<body>
<h1>Student Records</h1>
<h2>Before sorting </h2>
<?php
$query=mysqli_query($con,"select * from tblstudent");
$students= mysqli_fetch_all ($query, MYSQLI_ASSOC);
?>
<table>
  <tr>
  <th> Sl. No. </th>
  <th> USN </th>
  <th> Name</th>
  <th> Department </th>
  </tr>
 
  <?php for($i=0; $i<sizeof($students);$i++){ ?>
    <tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $students[$i]["USN"]; ?></td>
    <td><?php echo $students[$i]["Name"]; ?></td>
    <td><?php echo $students[$i]["department"]; ?></td>
 </tr>
<?php } ?>
</table>
<?php
//Query for sorting 
//$query  = mysqli_query($con,"select * from tblstudent ORDER BY USN DESC");

//using selection sort - sort by USN
for($i=0; $i<sizeof($students);$i++){
    $minUSN = $i;
    for($j=$i+1;$j<sizeof($students);$j++){
        if($students[$j]["USN"] < $students[$minUSN]["USN"]) {
            $minUSN = $j;
        } 
    } // end inner for loop
    //swap
    $temp = $students[$i];
    $students[$i] = $students[$minUSN];
    $students[$minUSN] = $temp;
} 
?>
<h2>After sorting - Selection Sort </h2>
<table>
  <tr>
  <th> Sl. No. </th>
  <th> USN </th>
  <th> Name</th>
  <th> Department </th>
  </tr>
 
  <?php for($i=0; $i<sizeof($students);$i++){ ?>
    <tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $students[$i]["USN"]; ?></td>
    <td><?php echo $students[$i]["Name"]; ?></td>
    <td><?php echo $students[$i]["department"]; ?></td>
 </tr>
<?php } ?>
</table>

  
</body>
</html>
