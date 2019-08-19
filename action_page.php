<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";
// $_GET['FirstName'];
// $_GET['Lastname'];
// $_GET['DOB'];
// $_GET['Phone Number'];
// $_GET['Country'];
// $_GET['State'];
// $_GET['District'];
// $_GET['City'];
// $_GET['Pincode'];
// $_GET['Aadhaar Number'];
// $_GET['VoterId Details'];
$first= $_POST['FirstName'];
$last= $_POST['LastName'];
$dob= $_POST['DOB'];
$phone= (int)$_POST['phonenumber'];
$country= $_POST['country'];
$state= $_POST['state'];
$district= $_POST['district'];
$city =$_POST['city'];
$pincode=(int)$_POST['pincode'];
$aadhar= (int)$_POST['aadhar'];
$voter= $_POST['voterid'];



try {
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "INSERT INTO users (Firstname, Lastname, DOB, Phonenumber, Country, State, District, City, Pincode, Aadhaarnumber, VoterId)
//     VALUES ($first,
// $last, $dob, $phone, $country, '".$state."',$district, $city, $pincode, $aadhar, $voter)";
//     // use exec() because no results are returned
//     $conn->exec($sql);
    $dsn = "mysql:host=localhost;dbname=voting;charset=utf8mb4";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
      $pdo = new PDO($dsn, "root", "", $options);

    $stmt = $pdo->prepare("INSERT INTO users (Firstname, Lastname, DOB, Phonenumber, Country, State, District, City, Pincode, Aadhaarnumber, VoterId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$first, $last, $dob, $phone, $country, $state, $district, $city, $pincode, $aadhar, $voter]);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    echo "<br /><br />";
    print_r($e);
    }

$conn = null;

?>

            <?php header("Location: election3.html"); ?>
