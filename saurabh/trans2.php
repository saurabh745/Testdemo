<?php
  $email=$_POST['email'];
  $email2=$_POST['email2'];
  $credit=$_POST['credit'];
  $temp=0;
  $host="localhost";
  $dbUsername="root";
  $dbPassword="";
  $dbname="creditm";
  $con=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
  $result = mysqli_query($con,"SELECT * FROM users where email='$email'");

  while($row = mysqli_fetch_array($result))
    {
      if($credit>$row['credit']){
        header("Location: new.html");
        exit;
      }
    }
    $result = mysqli_query($con,"SELECT * FROM users where email='$email'");
    while($row = mysqli_fetch_array($result))
      {
        $temp=$row['credit'];
      }
    $temp=$temp-$credit;
    $UPDATE = "UPDATE users set credit = $temp where email='$email' ";
    $stmt = $con->prepare($UPDATE);
    $stmt->execute();

    $result = mysqli_query($con,"SELECT * FROM users where email='$email2'");
    while($row = mysqli_fetch_array($result))
      {
        $temp=$row['credit'];
      }
      $temp=$temp+$credit;
      $UPDATE = "UPDATE users set credit = $temp where email='$email2' ";
      $stmt = $con->prepare($UPDATE);
      $stmt->execute();


    $INSERT = "INSERT INTO transaction ( sender,receiver,credit ) values (?,?,?)";

    $stmt = $con->prepare($INSERT);
    $stmt->bind_param("sss",$email,$email2,$credit);
    $stmt->execute();
	?>
    <a href='index.php'><button type='submit' name='button'>Back to home page</button></a>
  
