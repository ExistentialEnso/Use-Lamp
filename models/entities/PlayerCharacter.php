<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities;

/**
 * Class PlayerCharacter
 * @Entity
 * @Table(name="playercharacter")
 * @package models\entities
 */
class PlayerCharacter extends GameEntity {
  /**
   * Items currently in this player's inventory.
   *
   * @OneToMany(targetEntity="\models\entities\Item", mappedBy="in_inventory_of_player")
   * @var array
   */
  protected $inventory_items;


}