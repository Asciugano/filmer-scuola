<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();

require_once "../config.php";
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if (isset($_POST['id'])) {
    $itemID = $_POST['id'];
    if (isset($_SESSION['userID'])) {
      if (isset($itemID)) {

        if (isset($_POST['type'])) {
          if ($_POST['type'] === "film") {
            // MARK: FILM
            $table = "user_film_favourites";
            $field = "filmID";
          } else {
            // MARK: CINEMA
            $table = "user_cinema_favourites";
            $field = "cinemaID";
          }

          $stmt = $conn->prepare("INSERT INTO $table (userID, $field) VALUES (?, ?);");
          $stmt->bind_param("ii", $_SESSION['userID'], $itemID);
          if (!$stmt->execute()) {
            $_SESSION['err'] = "Impossibile mettere questo $_POST[type] nei preferiti";
          }

          $_SESSION['err'] = "";
        } else {
          $_SESSION['err'] = "Tipo non impostato";
        }
      } else {
        $_SESSION['err'] = "Devi selezionare qualcosa";
      }
    } else {
      $_SESSION['err'] = "Devi essere loggato per questa operazione";
    }
  } else {
    $_SESSION['err'] = "Errore nella richiesta";
  }
  header("Location: " . $_SESSION['current_page']);
  exit();
}
