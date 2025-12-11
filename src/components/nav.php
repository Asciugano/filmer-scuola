<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$logged = $_SESSION['logged'] ?? false;
$current_page = $_SESSION['current_page'] ?? "index.php";
?>

<body>
  <nav>
    <h2 class="logo">Film</h2>
    <ul>
      <?php if ($current_page != "/pages/film_page.php"): ?>
        <li><a href="/pages/film_page.php">Film</a></li>
      <?php endif; ?>
      <!-- TODO: Aggiungere le proiezioni -->
      <!-- TODO: Aggiungere i prefetiti -->
      <?php if ($current_page != "/pages/cinema_page.php"): ?>
        <li><a href="/pages/cinema_page.php">Cinema</a></li>
      <?php endif; ?>
      <?php if ($current_page != "/pages/registi_page.php"): ?>
        <li><a href="/pages/registi_page.php">Registi</a></li>
      <?php endif; ?>
      <?php if (!$logged): ?>
        <li><button onclick="auth(true)" class="login">Login</button>
        <?php else: ?>
        <li><button onclick="auth(false)" class="logout">Logout</button>
        <?php endif; ?>
        <li><button onclick="search()" class="search"><img src="../res/icons/search.png" alt="search"></button>
    </ul>
    <form action="/components/search.php" method="get" id="search-form" class="hidden">
      <select name="table">
        <option value="film">film</option>
        <option value="registi">registi</option>
        <option value="cinema">cinema</option>
      </select>
      <input type="text" name="value" placeholder="Cerca qualcosa" required>
      <input type="submit" value="Cerca">
    </form>
  </nav>

  <script src="../js/navbar.js"></script>
</body>
