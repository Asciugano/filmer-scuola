<?php
function proiezioniCard($proiezioni)
{
?>
  <div class="card">
    <?php filmCard($proiezioni['film']) ?>
    <?php filmCard($proiezioni['cinema']) ?>
  </div>
<?php
}
