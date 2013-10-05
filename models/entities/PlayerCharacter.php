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

  /**
   * The user that owns this player
   *
   * @ManyToOne(targetEntity="\models\User")
   * @var \models\User
   */
  protected $user;

  /**
   * @param array $inventory_items
   */
  public function setInventoryItems($inventory_items) {
    $this->inventory_items = $inventory_items;
  }

  /**
   * @return array
   */
  public function getInventoryItems() {
    return $this->inventory_items;
  }

  /**
   * @param \models\User $user
   */
  public function setUser($user) {
    $this->user = $user;
  }

  /**
   * @return \models\User
   */
  public function getUser() {
    return $this->user;
  }
}