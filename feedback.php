<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" type="x-icon" href="cspit.png">
  <link rel="stylesheet" href="new.css">
  <title> Feedback Form</title>
  <style>
    form {
    width: 400px;
    margin: auto;
    text-align: center;
        }
  
  div {
    margin-bottom: 15px;
  }
  
  label {
    display: inline-block;
    width: 100px;
    text-align: right;
  }
  
  input[type="text"],input[type="email"],textarea {
    width: 250px;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 20px;
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
    </style>
</head>
<body>
    <header>
		<h1>Feedback Form</h1>
		<nav>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="calculate.html">Calculate your Rank</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="feedback.php">Feedback</a></li>
			</ul>
		</nav>
	</header>
  <!-- feedback form goes here -->
  <main>
  <form method="post">
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div>
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <div>
      <input type="submit" value="Submit" name="sub">
    </div>
  </form>
  </main>
  <footer>
        <br><br> <br><br> <br> <br><br><br><br><br><br>
		<p>&copy;2023 College admission predictor by Riya Thakker, Riya Bhimani</p>
	</footer>
</body>
</html>
<?php 
ob_start(); 
require 'config.php';
if (isset($_POST['sub'])) {
  // echo "HI";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
// echo $name;
$q = "INSERT INTO feedback VALUES ('$name','$email','$message')";
// $query = mysqli_query($con,$q);
// if($query)
if ($con->query($q) === FALSE) {
  echo "Error: " . $q . "<br>" . $con->error;
} 
  
// echo $query;
echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
}
?>