<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $error = "";
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once '../config.php';
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc();
    if (!$user || !password_verify($password, $user['password'])) {
      $error = "Credenziali errate";
    } else {
      $_SESSION['logged'] = true;
      $_SESSION['userID'] = $user['id'];
      header("Location: $_SESSION[current_page]");
      exit();
    }
  } else {
    $error = "Tutti i campi sono obbligatori";
  }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Login</h1>

    <?php if (!empty($error)): ?>
      <h2 class="error"><?= htmlspecialchars($error) ?></h2>
    <?php endif; ?>

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
      <p>Non hai ancora un account? <a href="/pages/register.php">Registrati</a></p>
    </form>
  </div>

  <script src="../js/auth.js"></script>
</body>

</html>
