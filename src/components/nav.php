<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$logged = $_SESSION['logged'] ?? false;
?>

<body>
  <nav>
    <h2 class="logo">Film</h2>
    <ul>
      <li><a href="#">Film</a></li>
      <li><a href="#">Cinema</a></li>
      <li><a href="#">Registi</a></li>
      <?php if (!$logged): ?>
        <li><button onclick="" class="login">Login</button>
        <?php else: ?>
        <li><button onclick="" class="logout">Logout</button>
        <?php endif; ?>
        <li><button onclick="" class="search"><img src="../res/icons/search.png" alt="search"></button>
    </ul>
  </nav>

  <script>
    document.querySelector('.logo').addEventListener('click', () => {
      window.location.href = "/index.php";
    });
  </script>
</body>
