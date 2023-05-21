<?php
$servername = "localhost:3306";
$username = "root";
$password = "Shreetam@123";
$dbname = "banking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

@$sender =  $_POST['sdr'];
@$resiver = $_POST['rvr'];
@$amnt =  $_POST['amnt'];

if ($sender===$resiver) {
  header("Location: failed.html");
}
else{
  @$balance="SELECT balance FROM banking_system.customers where id_customers='$sender' ";
  if($amnt<=$balance){
    $sql = "UPDATE banking_system.customers SET balance = balance-'$amnt' where id_customers='$sender'";

    $sql1 = "UPDATE banking_system.customers SET balance = balance+'$amnt' where id_customers='$resiver'";

    $sql2 = "INSERT INTO banking_system.history (senders_id, recievers_id, amount)
    VALUES ('$sender', '$resiver', '$amnt')";

    $conn->query($sql1);

    if ($conn->query($sql) === TRUE) {
      header("Location: success.html");
    } else {
      header("Location: failed.html");
    }
    $conn->query($sql2);
    // if ($conn->query($sql1) === TRUE) {
    //   echo "New record update successfully";
    // } else {
    //   echo "Error: " . $sql1 . "<br>" . $conn->error;
    // }

    $conn->close();
  }
  else{
    header("Location: failed.html");
  }
}


?>