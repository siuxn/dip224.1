<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "";
$db = "assignment"; 

session_start();
$data = mysqli_connect($host, $user, $password, $db);

// Check connection to database
if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}


if (isset($_POST['register'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $usertype = "user";

  // Check if the email already exists in the database
  $check_email_query = "SELECT * FROM login WHERE email = '$email'";
  $check_email_result = mysqli_query($data, $check_email_query);

  // Check if the username already exists in the database
  $check_username_query = "SELECT * FROM login WHERE username = '$username'";
  $check_username_result = mysqli_query($data, $check_username_query);

  if (mysqli_num_rows($check_email_result) > 0) {
    echo "<script>alert('This email is already registered. Please choose another email!')</script>";
  } elseif (mysqli_num_rows($check_username_result) > 0) {
      echo "<script>alert('This username is already taken. Please choose another username!')</script>";
  } elseif ($password != $confirmpassword) {
      echo "<script>alert('Passwords do not match. Please re-enter the same password!')</script>";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Invalid email format!')</script>";
  } elseif (!preg_match('/@gmail\.com$/', $email)) {
      echo "<script>alert('Email domain must be @gmail.com!')</script>";
  } elseif (strlen($password) < 8) {
      echo "<script>alert('Password must be at least 8 characters long!')</script>";
  } else {
      // Proceed with registration
      $sql = "INSERT INTO login (email, password, username, usertype) VALUES ('$email', '$password', '$username', '$usertype')";
      $result = mysqli_query($data, $sql);
      
      if ($result) {
          echo "<script>alert('Registration successful, please log in on the login page!')</script>";
      } else {
          echo "Registration unsuccessful!";
      }
  }

}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
  $email = mysqli_real_escape_string($data, $_POST["email"]);
  $password = mysqli_real_escape_string($data, $_POST["password"]); 


  $sql = "SELECT * FROM login WHERE email ='$email' AND password ='$password'";
  $result = mysqli_query($data, $sql);
  $row = mysqli_fetch_array($result);

  if ($row) {
      // Set a cookie to remember the email for future logins
      setcookie("remember_email", $email, time() + (86400 * 30), "/"); // Cookie lasts for 30 days

      // Set the email in the session
      $_SESSION["email"] = $email;

      $_SESSION["username"] = $row['username'];
      if ($row["usertype"] == "user") {
          header("location:home.html");
          exit();
      } elseif ($row["usertype"] == "admin") {
          header("location:admin.php");
          exit();
      }
  } else {
      echo "<script>document.addEventListener('DOMContentLoaded', function() {
          var popUpDiv = document.createElement('div');
          popUpDiv.style.position = 'fixed';
          popUpDiv.style.bottom = '20px';
          popUpDiv.style.left = '50%';
          popUpDiv.style.transform = 'translateX(-50%)';
          popUpDiv.style.backgroundColor = '#f2f2f2';
          popUpDiv.style.padding = '10px';
          popUpDiv.style.border = '1px solid #ccc';
          popUpDiv.style.borderRadius = '5px';
          popUpDiv.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
          popUpDiv.innerText = 'Email or Password incorrect';
          document.body.appendChild(popUpDiv);
      });</script>";
  }
}
?>

<!DOCTYPE html>
<html lang ="en">
<head>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #a9bd70,#6b8c32,#507946
, #3d6036);
}
::selection{
  background: #007D62;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 15px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 15px;
  background: -webkit-linear-gradient(left,#a9bd70,#6b8c32,#507946
  , #3d6036);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 15px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #007D62;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #4F6F46;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #428675;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 15px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right,#a9bd70,#6b8c32,#507946
  , #3d6036);;
  border-radius: 15px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 15px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}

 </style>
    <link rel = "stylesheet" href ="loginandsignup.css">
    <title>Login or sign up? </title>
</head>


<div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="#" method ="POST" class="login" >
          <div class="field">
          <input type="text" name="email" placeholder="Email Address" required value="<?php echo isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : ''; ?>">

          </div>
          <div class="field">
            <input type="password" name ="password" placeholder="Password" required>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name ="login" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="">Signup now</a></div>
        </form>
        <form action="#" method ="POST" class="signup">
          <div class="field">
            <input type="text" name ="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input type="username"  name="username" placeholder="username" required>
          </div>
          <div class="field">
            <input type="password" name ="password" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" name ="confirmpassword"placeholder="Confirm password" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name ="register" value="Signup">
          </div>
        </form>
        
      </div>
    </div>
  </div>
  <script>
    const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (()=>{
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
  signupBtn.click();
  return false;
});

  </script>

</html>