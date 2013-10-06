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
class PlayerCharacter extends Character {
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
   * @Column(type="datetime")
   * @var \DateTime
   */
  protected $last_active;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $money = 10;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $health = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $max_health = 100;

  public function getInventoryWeight() {
    if(is_null($this->inventory_items)) return 0;

    $total = 0;
    foreach($this->inventory_items as $item) {
      $total += $item->getWeight();
    }

    return $total;
  }

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

  /**
   * @param int $money
   */
  public function setMoney($money) {
    $this->money = $money;
  }

  /**
   * @return int
   */
  public function getMoney() {
    return $this->money;
  }

  /**
   * @param int $health
   */
  public function setHealth($health) {
    // Don't let health go over the maximum
    if($health > $this->max_health) $health = $this->max_health;
    if($health < 0) $health = 0;

    $this->health = $health;
  }

  /**
   * @return int
   */
  public function getHealth() {
    return $this->health;
  }

  /**
   * @param int $max_health
   */
  public function setMaxHealth($max_health) {
    $this->max_health = $max_health;
  }

  /**
   * @return int
   */
  public function getMaxHealth() {
    return $this->max_health;
  }

  /**
   * @param \DateTime $last_active
   */
  public function setLastActive($last_active) {
    $this->last_active = $last_active;
  }

  /**
   * @return \DateTime
   */
  public function getLastActive() {
    return $this->last_active;
  }
}