<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login.php</title>
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Login</h1>
    <form class="auth-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div>
        <img src="../res/icons/person.png" alt="person">
        <input type="text" name="email" placeholder="email" required>
      </div>
      <div>
        <img src="../res/icons/lock.png" alt="lock">
        <input type="password" name="password" id="pass-inp" placeholder="password" required>
        <img src="../res/icons/eye.png" alt="eye" id="pass-btn">
      </div>

      <input type="submit" value="Login" class="login">
    </form>
  </div>

  <script src="../js/auth.js"></script>
</body>

</html>
