<?php
session_start();
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

require_once "./components/film_card.php";
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
</body>

</html>
