<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <meta name='robots' content='follow,index' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <title>Vunerable Web</title>
  <link rel='shortcut icon' href='#' />
  <link rel='stylesheet' href='css/login-panel.css' />
  <link rel='stylesheet' href='css/login.css' />
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap' />
</head>

<body>
  <div class='content-body'>
    <div class='form-wrapper'>
      <form class='bg-white' action='index.php' method='post'>
        <h1 class='text-title'>Login to your account</h1>

        <div class='field-group'>
          <label class='label' for='username'>Username</label>
          <input class='input' type='text' id='username' name='username' placeholder='Enter username' />
        </div>
        <div class='field-group'>
          <label class='label' for='password'>Password</label>
          <input class='input' type='password' id='password' name='password' placeholder='Enter password' />
          <a href='#forgot' class='link-forgot'>Forgot?</a>
        </div>
        <div class='field-group'>
          <input class='btn-submit' type='submit' value='Log In' />
        </div>
        <div id='response-text' />
      </form>
      <div class='bg-grey'>
        <a href='/register.php' class='link-register'>Sign Up</a>
      </div>
    </div>
  </div>
</body>

</html>

<?php
// Assuming you have a database connection established
include('database.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
      header("Location: main.php");
    } else {
      echo "<script>document.getElementById('response-text').innerHTML = 'Username or password incorrect!';</script>";
    }
  }
  else {
    echo "<script>document.getElementById('response-text').innerHTML = 'Please fill in all fields!';</script>";
  }
}
?>