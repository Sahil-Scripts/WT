<!DOCTYPE html>
<html>
<head>
    <title>Visitors Count</title>
</head>
<body>
   <h1>Welcome to my page </h1>

   <hr>
   <footer>
    <?php
 $counter_name = "counter.txt";
 $counterVal = file_get_contents($counter_name);
 
 $counterVal++;
 $fhand= fopen($counter_name, "w");
 fwrite($fhand, $counterVal);
 fclose($fhand); 
    ?>
    <em>No. of visitors : <?php echo $counterVal; ?></em>
</footer>
    
</body>
</html>
