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
  </div>
<?php
}
