<?php
session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

require_once 'database.php';
?>

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
      <form class='bg-white' action='register.php' method='post'>
        <h1 class='text-title'>Sign up new account</h1>
        <div class='field-group'>
          <label class='label' for='email'>Email address</label>
          <input class='input' type='email' id='email' name='email' placeholder='johndoe@gmail.com' />
        </div>
        <div class='field-group'>
          <label class='label' for='username'>Username</label>
          <input class='input' type='text' id='username' name='username' placeholder='Enter username' />
        </div>
        <div class='field-group'>
          <label class='label' for='password'>Password</label>
          <input class='input' type='password' id='password' name='password' placeholder='Enter password' />
        </div>
        <div class='field-group'>
          <input class='btn-submit' type='submit' value='Register' />
        </div>
        <div id='response-text'></div>
        <div>
          <a href='/login.php' class='link-login' style="text-decoration: none">Back to Login</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>document.getElementById('response-text').innerHTML = 'Invalid email format' </script>";
    } else {
      $query = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt, "sss", $email, $username, $password);
      mysqli_stmt_execute($stmt);

      if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>document.getElementById('response-text').innerHTML = 'Account created successfully!';</script>";
      } else {
        echo "<script>document.getElementById('response-text').innerHTML = 'Failed to create account!';</script>";
      }

      mysqli_stmt_close($stmt);
    }
  } else {
    echo "<script>document.getElementById('response-text').innerHTML = 'Please fill in all fields!';</script>";
  }
}
?>