 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Credit Management</title>
     <link href="demo.css" rel="stylesheet">
   </head>
   <body>
     <?php
     $email=$_POST['email'];
     $host="localhost";
     $dbUsername="root";
     $dbPassword="";
     $dbname="creditm";
     $con=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
     $result = mysqli_query($con,"SELECT * FROM users where email='$email'");
     while($row = mysqli_fetch_array($result))
     {
       echo "<h2>Details of" . $row['firstname'] . "</h2><hr><h3>Name - " . $row['firstname']." ".$row['lastname'] . "<br>Date of Birth - ".$row['dob']."<br>Gender - ".$row['gender']."<br>Credit Balance - ".$row['credit']."</h3> <form action='trans.php' method='post'><input type='hidden' name='email' value='".$email."'><button type='submit' name='button'>Make Transaction</button></form><form action='view.php' method='POST'><input type='hidden' name='email' value='".$email."'><button type='submit' name='button'>View Transaction</button></form></td></tr>";
     }
     ?>
   </body>
 </html>
