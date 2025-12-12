<?php
function filmCard($film)
{
  if (session_status() === PHP_SESSION_NONE)
    session_start();
?>
  <?php if (!empty($_SESSION['err'])): ?>
    <h2 class="error"><?= $_SESSION['err'] ?></h2>
  <?php endif; ?>
  <div class="card">
    <img src="<?= $film['locandina'] ?>" alt="locandina">
    <h2><?= $film['titolo'] ?></h2>
    <p><?= $film['regista']['nome'] ?> <?= $film['regista']['cognome'] ?></p>
    <p><?= $film['durata'] ?> min</p>
    <p><?= $film['anno'] ?></p>

    <div class="card-actions hidden">
      <form action="/services/favourites.php" method="post">
        <input type="hidden" name="type" value="film">
        <input type="hidden" name="id" value="<?= $film['id']; ?>">
        <input type="submit" value="Aggiungi ai preferiti">
      </form>
      <!-- TODO: implementare le proieizoni -->
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $film['id']; ?>">
        <input type="submit" value="Scopri le proiezioni">
      </form>
    </div>
  </div>
<?php
}
