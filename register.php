<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akhava";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully"."<br>";


$name = $email  = $dob = $pan = $phno = $age = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["dname"];
  $email =$_POST["demail"];
  $dob = $_POST["ddob"];
  $pan = $_POST["dpan"];
  $phno = $_POST["dphno"];
  $age = $_POST["dage"];
}

$sqlinsert = "INSERT INTO donor(dname,dage,ddob,demail,dpan,dphno) VALUES ('$name',$age,'$dob','$email','$pan',$phno)";
if($conn->query($sqlinsert))
	echo "Inserted successfully"."<br>";

$sql = "SELECT did, dname, dage FROM donor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Did: " . $row["did"]. " - Name: " . $row["dname"]." Age-".$row["dage"]."<br>";
    }
}
else {
    echo "0 results";
}

$conn->close();

?>