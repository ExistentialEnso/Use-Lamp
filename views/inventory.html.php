<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

$items = $player->getInventoryItems();
?>
Money: <?=$player->getMoney()?> coins<br />
<?php
if(count($items) == 0) {
  ?>You have nothing else in your inventory.<?php
} else {
  ?>Your inventory contains:<br /><?php
  foreach($items as $item) {
    ?>
    * <?=$item->getName()?><br />
    <?php
  }
  ?>
  The total weight of these items is <?=$player->getInventoryWeight()?> kg.
  <?php
}
?>