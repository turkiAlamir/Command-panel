<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "RobotHistory";
$TableName = "Commands";
if(isset($_POST['btnValue']))
{
    // Getting the value of button
    // in $btnValue variable
    $btnValue = $_POST['btnValue'];
   

}
// Connect to MySQL
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (mysqli_select_db($conn,$dbName )){

        echo "Connected to Database successfully \r\n";
    }else {
        echo "Error Connecting to database: " . $conn->error;
    }
    $sql = "INSERT INTO ".$TableName." (Commands)
    VALUES ('$btnValue')";

              if ($conn->query($sql) === TRUE) {
                echo "Data Inserted successfully \r\n";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }         

$sql = "SELECT id, Commands, reg_date FROM ".$TableName;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Command: " . $row["Commands"]. " - Date and Time: " . $row["reg_date"]. "\r\n";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
