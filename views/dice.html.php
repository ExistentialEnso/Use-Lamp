<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/
if($sides == 2) {
  // A two-sided dice is really a coin...
  $side = ($value == 1) ? "heads" : "tails";
  ?>
  You flip a coin. It lands on <?=$side?>.
  <?php
} else {
  ?>
  You conjure a <?=$sides?>-sided dice from the nether. It tumbles to the ground and lands on <?=$value?>.
<?php
}