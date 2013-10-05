<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

$items = $player->getInventoryItems();

if(count($items) == 0) {
  ?>You have nothing in your inventory.<?php
} else {
  ?>Your inventory contains:<br /><?php
  foreach($items as $item) {
    ?>
    * <?=$item->getName()?><br />
    <?php
  }
}
?>