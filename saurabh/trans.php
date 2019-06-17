<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Credit Management</title>
    <link href="demo.css" rel="stylesheet">
  </head>
  <body>

    <form action="trans2.php" method="POST">
    <label for="user">Select Receivers Name</label>
    <select id="user" name="email2" required>
      <?php
        $email=$_POST['email'];
        $host="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbname="creditm";
        $con=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
        $result = mysqli_query($con,"SELECT * FROM users where email!='$email'");

        while($row = mysqli_fetch_array($result))
          {
          echo "<option value='" . $row['email'] . "' > " . $row['firstname']." ".$row['lastname']." </option> " ;
		      }
        ?>

    </select>
    <p></p><label for='credit'>Credit</label>
    <input type="number" id="credit" name="credit" placeholder="Credit to be transfered" required>
    <br><br>
    <input type='hidden' name='email' value='<?php echo $email; ?>'>
    <input id='sub' type="submit" value="Submit">
    </form>
  </body>
</html>
