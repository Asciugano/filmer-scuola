<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_SESSION['current_page'] = "/pages/film_page.php";

require_once "../config.php";
require_once "../components/film_card.php";

$conn = getConnection();

$result = $conn->query("SELECT film.*, registi.* FROM film INNER JOIN registi ON registi.id = film.idRegista");
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
$conn = getConnection();
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
    <h1>Films</h1>
    <div class="films">
      <?php foreach ($films as $film): ?>
        <?php filmCard($film); ?>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="../js/film-card.js"></script>
</body>

</html>
