<?php
/*$con=mysql_connect("localhost","root","") or die("mysql error");
mysql_select_db('pharmacy',$con) or die("coudnot connect to database");*/
/*$con=mysqli_connect("localhost","root","","pharmacy") or die(mysqli_error($con));*/
/*$con = mysqli_connect("localhost","root","","pharmacy") or die("Error " . mysqli_error($con));*/
/*$con= mysqli_connect("localhost","root","") or die ("could not connect to mysql"); 

mysqli_select_db($con,"pharmacy") or die ("no database"); */






$dbhost = 'localhost:3306';
         $dbuser = 'root';
         $dbpass = '';
         $dbname = 'admintest';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
        /* echo 'Connected successfully<br>';*/

         /*if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               echo "Name: " . $row["name"]. "<br>";
            }
         } else {
            echo "0 results";
         }
         mysqli_close($conn);*/
?>