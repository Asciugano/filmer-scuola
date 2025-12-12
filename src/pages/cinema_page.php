<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_SESSION['current_page'] = "/pages/cinema_page.php";

require_once "../config.php";
require_once "../components/cinema_card.php";

$conn = getConnection();

$result = $conn->query("SELECT * FROM cinema");
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cinema</title>
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <?php include "../components/nav.php" ?>


  <div class="film-list">
    <h1>Cinema</h1>
    <div class="films">
      <?php foreach ($cinemas as $cinema): ?>
        <?php cinemaCard($cinema); ?>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>
