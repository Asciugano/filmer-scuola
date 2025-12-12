<?php
function cinemaCard($cinema)
{
?>
  <div class="card">
    <h2><?= $cinema['nome'] ?></h2>
    <p><?= $cinema['citta'] ?></p>
    <p><?= $cinema['numSale'] ?></p>
    <p><?= $cinema['numPost'] ?></p>

    <div class="card-actions hidden">
      <form action="/services/favourites.php" method="post">
        <input type="hidden" name="type" value="cinema">
        <input type="hidden" name="id" value="<?= $cinema['id']; ?>">
        <input type="submit" value="Aggiungi ai preferiti">
      </form>
      <!-- TODO: implementare le proieizoni -->
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $cinema['id']; ?>">
        <input type="submit" value="Scopri le proiezioni">
      </form>
    </div>
  </div>
  <script>
  </script>
<?php
}
