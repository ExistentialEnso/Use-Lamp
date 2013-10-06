<?php
/**
 * @author Thorne Melcher <tmelcher@portdusk.com>
 *
 * @TODO - actually show status menu
 */

$health_p = number_format((($player->getHealth() / $player->getMaxHealth()) * 100), 1);
?>
Health: <?=$player->getHealth()?>/<?=$player->getMaxHealth()?> [<?=$health_p?>%]<br />
Strength: <?=$player->getStrength()?><br />
Intellect: <?=$player->getIntellect()?><br />
Dexterity: <?=$player->getDexterity()?><br />
Charisma: <?=$player->getCharisma()?><br />
Luck: <?=$player->getLuck()?><br />