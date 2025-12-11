<?php
function cinemaCard($cinema)
{
?>
  <div class="card">
    <h2><?= $cinema['nome'] ?></h2>
    <p><?= $cinema['citta'] ?></p>
    <p><?= $cinema['numSale'] ?></p>
    <p><?= $cinema['numPost'] ?></p>
  </div>
  <script>
  </script>
<?php
}
