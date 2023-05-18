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
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        echo "<script>alert('Login successful. Welcome!');</script>";
        header("Location: home.php");
        exit;
    } else {
        $error_message = "Invalid email or password";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SHM CMLL Online Store Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

form {
    border: 1px solid gray;
    height: 350px;
    width: 80%;
    border-radius: 10px;
    background: linear-gradient(to right, #373b44, #4286f4);
    position: relative;
    margin-top: 100px;
    margin-bottom: 100px;
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
    margin-top: 50px;
}
.signup {
    float: right;
    text-decoration: none;
    color: #fff;
    margin-right: 10px;
    margin-top: 60px;
}
.signup:hover {
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

<form action="login.php" method="post" style="max-width:500px;margin:auto; margin-top: 100px;">
  <h2>Login</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password">
  </div>
  
  <button type="submit" class="button">Login</button>
  <a href="register.php" class="signup">Signup here!</a>
</form>

</body>
</html>
