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
      $sender="a";
      $reveiver="a";
      $senderemail="a";
      $reveiveremail="a";
      $credit="a";
      $date="a";
      $con=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
      $conn=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
      $result = mysqli_query($con,"SELECT * FROM users where email='$email'");

      while($row = mysqli_fetch_array($result))
        {
          echo "<h2> Transactions of " . $row['firstname']." ".$row['lastname']."</h2><hr> " ;
        }
    ?>
    <table width="100%" cellpadding="28"
        <th><td>Sender</td><td>Receiver</td><td>Credit</td><td>Date</td></th>
          <?php
            $result = mysqli_query($con,"SELECT * FROM transaction where sender='$email' OR receiver='$email'");
            while($row = mysqli_fetch_array($result))
              {
                    $senderemail=$row['sender'];
                    $reveiveremail=$row['receiver'];
                    $credit=$row['credit'];
                    $date=$row['time'];
                    $resulttemp = mysqli_query($conn,"SELECT * FROM users where email='$senderemail'");

                    while($row = mysqli_fetch_array($resulttemp))
                      {
                        $sender = $row['firstname']." ".$row['lastname'] ;
                      }
                      $resulttemp = mysqli_query($conn,"SELECT * FROM users where email='$reveiveremail'");

                      while($row = mysqli_fetch_array($resulttemp))
                        {
                          $reveiver = $row['firstname']." ".$row['lastname'] ;
                        }
                    echo "<tr><td>".$sender."</td><td>".$reveiver."</td><td>".$credit."</td><td>".$date."</td></tr>";

              }


          ?>

    </table>
  </body>
</html>
