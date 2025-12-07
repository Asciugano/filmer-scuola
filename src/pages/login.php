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
  <form class="auth-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
      <img src="#" alt="person">
      <input type="text" name="email" required>
    </div>
    <div>
      <img src="#" alt="lock">
      <input type="password" name="password" id="pass-inp" required>
      <img src="#" alt="eye" id="pass-btn">
    </div>

    <input type="submit" value="Login" class="login">
  </form>

  <script src="../js/auth.js"></script>
</body>

</html>
