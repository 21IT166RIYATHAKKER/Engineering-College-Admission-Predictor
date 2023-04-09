<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="x-icon" href="cspit.png">
	<title>Predictor</title>
	<link rel="stylesheet" href="new.css">
	<style>
		
	table{
	border-collapse:collapse;
	margin: 5px;
	border: 2px solid white;
	color:white;
}
td{
	padding: 10px;
	border: 1px solid white;
}
th{
	padding: 10px;
	border: 1px solid white;
	
}
h2{
	color:white;
}
input{
    padding: 5px;
    margin:5px;
}
input[type="submit"] {
    width: 100px;
    padding: 5px;
    border-radius: 5px;
    border: none;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
  }
  
  input[type="submit"]:hover {
    background-color: #0062cc;
  }
  

form {
	margin-bottom: 20px;
}
#result {
	font-size: 24px;
	font-weight: bold;
	color: #e8edf1;
}

		</style>
</head>
<body>
	<header>
		<h1>Engineering College Admission Predictor</h1>
		<nav>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="calculate.html">Calculate your Rank</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="feedback.php">Feedback</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h2>Enter your ACPC rank</h2>
		<form id="acpc-rank" method="Post">
			<label for="acpc-rank"></label>
			<input type="number" name="acpc-rank" id="acpc-rank"required>
<select id="branch" name="branch">
	<option value="Information Technology Engineering">Information Technology Engineering</option>
	<option value="Computer Engineering">Computer Engineering</option>
	<option value="Computer Science & Engineering">Computer Science & Engineering</option>
	<option value="Mechanical Engineering">Mechanical Engineering</option>
	<option value="Electrical Engineering">Electrical Engineering</option>
	<option value="AI & ML">AI & ML</option>
</select>
			<input type="submit" value="Predict" name="sub">
		</form>
		<div id="result"></div>
	</main>
</body>
</html>
<?php
// Connect to the database
$servername = "localhost";
$username ="root";
$password ="";
$dbname = "college_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['sub'])) {
// Retrieve the ACPC rank from the form submission
$acpc_rank = $_POST['acpc-rank'];

$branch=$_POST['branch'];
echo "<table>";
// Retrieve the college data based on the ACPC rank
$sql = "SELECT * FROM colleges WHERE branch='$branch' AND cutoff <= $acpc_rank ORDER BY cutoff DESC";
$result = $conn->query($sql);
// Display the college data as a dynamic response
if ($result->num_rows > 0) {
	$response = "<h2>Colleges you can apply to:</h2>";
	$response .= "<table>";
	$response .= "<tr><th>Name</th><th>Branch</th><th>Intake</th><th>Cutoff</th></tr>";
	while ($row = $result->fetch_assoc()) {
		$response .= "<tr><td>" . $row['name'] . "</td><td>" . $row['branch'] . "</td><td>" . $row['intake'] . "</td><td>" . $row['cutoff'] . "</td></tr>";
	}
	$response .= "</table>";
} else {
	$response = "<h2>No colleges found for your ACPC rank.</h2>";
}
echo $response;
echo "<table>";
}

// Close the database connection
$conn->close();
?>