<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_SESSION['current_page'] = "/pages/preferiti_page.php";

require_once "../config.php";
require_once "../components/film_card.php";
require_once "../components/cinema_card.php";

$conn = getConnection();

$err = "";
if (isset($_SESSION['userID'])) {
  $result = $conn->query("
                        SELECT film.*, registi.* 
                        FROM user_film_favourites 
                        INNER JOIN film ON film.id = user_film_favourites.filmID 
                        INNER JOIN registi ON registi.id = film.idRegista 
                        WHERE user_film_favourites.userID = $_SESSION[userID]
                        ");

  $films = [];
  while ($row = $result->fetch_assoc()) {
    $films[] = [
      'id' => $row['id'],
      'titolo' => $row['titolo'],
      'durata' => $row['durata'],
      'anno' => $row['anno'],
      'locandina' => $row['locandina'],
      'regista' => [
        'nome' => $row['nome'],
        'cognome' => $row['cognome']
      ]
    ];
  }

  $result = $conn->query("
                        SELECT cinema.* 
                        FROM user_cinema_favourites 
                        INNER JOIN cinema ON cinema.id = user_cinema_favourites.cinemaID
                        WHERE user_cinema_favourites.userID = $_SESSION[userID]
                        ");
  $cinemas = [];
  while ($row = $result->fetch_assoc()) {
    $cinemas[] = [
      'id' => $row['id'],
      'nome' => $row['nome'],
      'citta' => $row['citta'],
      'numSale' => $row['numSale'],
      'numPost' => $row['numPost'],
    ];
  }
} else {
  $err = "Devi essere loggato per vedere questa pagina";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Films</title>
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <?php include "../components/nav.php" ?>

  <div class="film-list">
    <h1>Film Preferiti: </h1>
    <?php if (empty($err)): ?>
      <div class="films">
        <?php foreach ($films as $film): ?>
          <?php filmCard($film); ?>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <h2 class="error"><?= $err ?></h2>
    <?php endif; ?>
  </div>

  <div class="film-list">
    <h1>Cinema Preferiti: </h1>
    <?php if (empty($err)): ?>
      <div class="films">
        <?php foreach ($cinemas as $cinema): ?>
          <?php cinemaCard($cinema); ?>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <h2 class="error"><?= $err ?></h2>
    <?php endif; ?>
  </div>
  <!-- <script src="../js/film-card.js"></script> -->
</body>

</html>
