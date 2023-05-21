<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Akaya Kanadaka' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body style="min-height: 100vh;background-color:lavender;">
  <div class="topnav" id="myTopnav">
    <a href="./index.html">Home</a></li>
    <a href="./customer.php">All Customers</a>
    <a href="./sender.html">Send Money</a>
    <a href="./history.php">Transtions</a>
    <a href="./contact.html">Contact Us</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
  <div class="contact">
  <table class="table table-bordered" id="customer_table">
                            <thead>
                              <tr>
                                <th>Transaction Id</th>
                                <th>Sender's Id</th>
                                <th>Reciever's Id</th>
                                <th>Transaction Amount</th>
                              </tr>
                            </thead>
                            <tbody>
    <?php
                        $servername = "localhost:3306";
                        $username = "root";
                        $password = "Shreetam@123";
                        $dbname = "banking_system";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM banking_system.history";
                        $result = $conn->query($sql);
                        while($info=mysqli_fetch_array($result)){
                        ?>
                        
                            
                            
                          
                            <tr>
                              <td><?php echo $info['transuction_id']?></td>
                              <td><?php echo $info['senders_id']?></td>
                              <td><?php echo $info['recievers_id']?></td>
                              <td><?php echo $info['amount']?></td>
                            </tr>
                            
                    <?php
                    }
                ?>
                </tbody>
                            </table>
  </div>
</body>
</html>