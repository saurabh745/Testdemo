<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Credit Management</title>
    <link href="demo.css" rel="stylesheet">
  </head>
  <body>
    <h1>CREDIT MANAGEMENT SYSTEM</h1>
    <hr>
    <table width="100%" cellpadding="28"
        <th><td>First Name</td><td>Last Name</td><td>Action</td></th>
     <?php
       $host="localhost";
       $dbUsername="root";
       $dbPassword="";
       $dbname="creditm";
       $con=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
       $result = mysqli_query($con,"SELECT * FROM users");
       while($row = mysqli_fetch_array($result))
       {
         $email=$row['email'];
         echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td> <form action='detail.php' method='post'><input type='hidden' name='email' value='".$email."'><button type='submit' name='button'>View</button></form></td></tr>";

       }
     ?></table>
  </body>
</html>
