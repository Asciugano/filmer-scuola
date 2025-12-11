<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  if (isset($_GET['azione'])) {
    if ($_GET['azione'] === "Aggiungi ai preferiti") {
      // TODO: implementare l'inserimento tra i prefetiti
    } elseif ($_GET['azione'] === "Scopri proiezioni") {
      // TODO: implementare le proiezioni
    }
  }
}
?>

<?php
function filmCard($film)
{
?>
  <div class="card">
    <img src="<?= $film['locandina'] ?>" alt="locandina">
    <h2><?= $film['titolo'] ?></h2>
    <p><?= $film['regista']['nome'] ?> <?= $film['regista']['cognome'] ?></p>
    <p><?= $film['durata'] ?> min</p>
    <p><?= $film['anno'] ?></p>

    <div class="card-actions hidden">
      <form action="" method="get">
        <input type="submit" name="azione" value="Aggiungi ai preferiti">
        <input type="submit" name="azione" value="Scopri proiezioni">
      </form>
    </div>
  </div>

  <script>
    document.querySelectorAll(".card").forEach((card) => {
      card.addEventListener("mouseenter", () => {
        card.querySelector(".card-actions").classList.remove("hidden");
        card.querySelector(".card-actions").classList.add("visible");
      });
      card.addEventListener("mouseleave", () => {
        card.querySelector(".card-actions").classList.remove("visible");
        card.querySelector(".card-actions").classList.add("hidden");
      })
    });
  </script>
<?php
}
