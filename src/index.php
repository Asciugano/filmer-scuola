<?php
session_start();
$_SESSION['current_page'] = "index.php";
require_once 'config.php';
$conn = getConnection();

$result = $conn->query("SELECT film.*, registi.* FROM film INNER JOIN registi ON registi.id = film.idRegista LIMIT 5");
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

$result = $conn->query("SELECT * FROM cinema LIMIT 3");
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


require_once "./components/film_card.php";
require_once "./components/cinema_card.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Filmer</title>
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <?php include("./components/nav.php") ?>

  <div class="film-list">
    <h2>Top Film<h2>
        <div class="films">
          <?php foreach ($films as $film): ?>
            <?php filmCard($film); ?>
          <?php endforeach; ?>
        </div>
  </div>
  <div class="film-list">
    <h2>Cinema</h2>
    <div class="films">
      <?php foreach ($cinemas as $cinema): ?>
        <?php cinemaCard($cinema); ?>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="./js/film-card.js"></script>
</body>

</html>
