<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\events;

/**
 * @Entity
 * @Table(name="action")
 * @package models\events
 */
class Action {
  /**
   * @Id
   * @GeneratedValue
   * @Column(type="integer")
   * @var int
   */
  protected $id;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $name;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $type = 1;

  /**
   * The exact behavior and whether or not it is even used is defined by "type" -- for instance, if the type is
   * "heal player," it will heal them by this amount.
   *
   * @Column(type="integer", nullable=true)
   * @var int
   */
  protected $amount;

  /**
   * The amount will be randomly +/- this value. Keep at 0 for a constant amount each time.
   * Example: If $amount==90 and $random_factor==10, the the actual amount will range from 90-110 when the action runs.
   *
   * @Column(type="integer", nullable=true)
   * @var int
   */
  protected $random_factor = 0;

  const TYPE_HEAL_PLAYER = 0;
  const TYPE_DMG_PLAYER = 1;

  public function execute(&$game, &$player) {
    switch($this->type) {
      case self::TYPE_HEAL_PLAYER:
        $amt = $this->amount + rand($this->random_factor * -1, $this->random_factor);

        $player->setHealth($player->getHealth() + $amt);
        return "You regain " . $amt . " health.<br />";
      case self::TYPE_DMG_PLAYER:
        $amt = $this->amount + rand($this->random_factor * -1, $this->random_factor);

        $player->setHealth($player->getHealth() - $amt);
        return "You lose " . $amt . " health.<br />" . ($player->getHealth() == 0 ? "You have died.<br />" : "");
    }
  }

  /**
   * @param int $type
   */
  public function setType($type) {
    $this->type = $type;
  }

  /**
   * @return int
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param int $amount
   */
  public function setAmount($amount) {
    $this->amount = $amount;
  }

  /**
   * @return int
   */
  public function getAmount() {
    return $this->amount;
  }

  /**
   * @param int $random_factor
   */
  public function setRandomFactor($random_factor) {
    $this->random_factor = $random_factor;
  }

  /**
   * @return int
   */
  public function getRandomFactor() {
    return $this->random_factor;
  }


}