<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SHM CMLL Online Store Registration</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

form {
    border: 1px solid gray;
    height: 450px;
    width: 80%;
    border-radius: 10px;
    background: linear-gradient(to right, #373b44, #4286f4);
    position: relative;

}
.input-container {
  display: -ms-flexbox; 
  display: flex;
  width: 80%;
  margin-bottom: 15px;
  margin-left: 60px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 80%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

.button {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
  margin-left: 120px;
  border-radius: 10px;
}

.button:hover {
  opacity: 1;
}
h2{
    text-align: center;
    justify-content: center;
    color: #fff;
    text-shadow: 1px 1px 1px black;
}
.login {
    float: right;
    text-decoration: none;
    color: #fff;
    margin-right: 10px;
}
.login:hover {
    color: yellow;
}
</style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      SHM CMLL Online Store 
    </a>
  </div>
</nav>

<form action="register.php" method="post" style="max-width:500px;margin:auto; margin-top: 100px;">
  <h2>Sign up</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Firstname" name="firstname">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Lastname" name="lastname">
  </div>
  
  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password">
  </div>
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Confirm Password" name="confirmpassword">
  </div>
   <button type="submit" class="button">Sign up</button><br>
   <a href="login.php" class="login">Sign in here!</a>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["confirmpassword"]; 

    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('You have successfully registered! You can now login to SHM CMLL Online Store');</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>
