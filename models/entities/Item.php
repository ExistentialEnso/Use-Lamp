<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities;

/**
 * A GameEntity that can be carried in an inventory.
 *
 * @package models\entities
 * @Entity
 * @Table(name="item")
 */
class Item extends GameEntity {
  /**
   * The inventory in which this item is located (if any)
   *
   * @ManyToOne(targetEntity="PlayerCharacter", inversedBy="inventory_items")
   * @var PlayerCharacter
   */
  protected $in_inventory_of_player;

  /**
   * The weight of the item in kg.
   *
   * @Column(type="float")
   * @var float
   */
  protected $weight = 0;

  /**
   * @param \models\entities\PlayerCharacter $in_inventory_of_player
   */
  public function setInInventoryOfPlayer($in_inventory_of_player) {
    $this->in_inventory_of_player = $in_inventory_of_player;
  }

  /**
   * Gets the player currently holding the item. Returns null if none holding.
   *
   * @return \models\entities\PlayerCharacter
   */
  public function getInInventoryOfPlayer() {
    return $this->in_inventory_of_player;
  }

  /**
   * @param float $weight
   */
  public function setWeight($weight) {
    $this->weight = $weight;
  }

  /**
   * @return float
   */
  public function getWeight() {
    return $this->weight;
  }


}