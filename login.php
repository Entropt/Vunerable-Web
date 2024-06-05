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
      <form class='bg-white' action='login.php' method='post'>
        <h1 class='text-title'>Login to your account</h1>

        <div class='field-group'>
          <label class='label' for='username'>Username</label>
          <input class='input' type='text' id='username' name='username' placeholder='Enter username' />
        </div>
        <div class='field-group'>
          <label class='label' for='password'>Password</label>
          <input class='input' type='password' id='password' name='password' placeholder='Enter password' />
        </div>
        <div class='field-group'>
          <input class='btn-submit' type='submit' value='Log In' />
        </div>
        <div id='response-text' />
      </form>
    </div>
    <div class='bg-grey'>
      <a href='/register.php' class='link-register'>Sign Up</a>
    </div>
  </div>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // avoid escape string by using \
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    // $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    // $result = mysqli_query($connect, $query);

    // Not all the sql queries use string condition, the bellow code is for the number condition
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
      $_SESSION['username'] = $username;

      Header("Location: index.php");
    } else {
      echo "<script>document.getElementById('response-text').innerHTML = 'Username or password incorrect!';</script>";
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "<script>document.getElementById('response-text').innerHTML = 'Please fill in all fields!';</script>";
  }
}
?>