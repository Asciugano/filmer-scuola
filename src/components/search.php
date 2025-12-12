<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  if (isset($_GET['table']) && isset($_GET['value'])) {
    $table = $_GET['table'];
    $value = "%" . $_GET['value'] . "%";

    require_once "./cinema_card.php";
    require_once "./film_card.php";
    require_once "../config.php";
    $conn = getConnection();

    switch ($table) {
      case "film":
        $stmt = $conn->prepare("SELECT film.*, registi.* FROM film INNER JOIN registi ON registi.id = film.idRegista WHERE titolo LIKE ? OR anno LIKE ?");
        break;
      case "registi":
        $stmt = $conn->prepare("SELECT film.*, registi.* FROM film INNER JOIN registi ON registi.id = film.idRegista WHERE nome LIKE ? OR cognome LIKE ?");
        break;
      case "cinema":
        $stmt = $conn->prepare("SELECT cinema.* FROM cinema WHERE nome LIKE ? OR citta LIKE ?");
        break;

      case "preferiti":
        // TODO: implementare la ricerca dai preferiti
        break;
      default:
        exit("Tabella invalida");
    }
    $stmt->bind_param("ss", $value, $value);
    $stmt->execute();
    $result = $stmt->get_result();
  }
}
?>

<?php
function fetchFilmOrRegisti($result)
{
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
  return $films;
}

function fetchCinema($result)
{
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
  return $cinemas;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <?php include "nav.php" ?>

  <?php if ($table == "film" || $table == "registi"): ?>
    <div class="film-list">
      <h2>Film trovati: </h2>
      <div class="films">
        <?php foreach (fetchFilmOrRegisti($result) as $film): ?>
          <?php filmCard($film); ?>
        <?php endforeach; ?>
      </div>
    </div>
  <?php elseif ($table == "cinema"): ?>
    <div class="film-list">
      <h2>Cinema Trovati: </h2>
      <div class="films">
        <?php foreach (fetchCinema($result) as $cinema): ?>
          <?php cinemaCard($cinema); ?>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else: ?>
    <h2 class="error">Impossibile cercare per la tabella selezionata</h2>
  <?php endif; ?>
</body>

</html>
