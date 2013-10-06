<?php
/**
 * @author Thorne Melcher <tmelcher@portdusk.com>
 *
 * @TODO - actually show status menu
 */

$health_p = number_format((($player->getHealth() / $player->getMaxHealth()) * 100), 1);
?>
Money: <?=$player->GetMoney()?> coins<br />
Health: <?=$player->getHealth()?>/<?=$player->getMaxHealth()?> [<?=$health_p?>%]<br />