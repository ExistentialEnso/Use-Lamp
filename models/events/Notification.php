<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\events;

use models\entities\PlayerCharacter;

/**
 * @Entity
 * @Table(name="notification")
 * @package models\events
 */
class Notification {
  /**
   * @Id
   * @GeneratedValue
   * @Column(type="integer")
   */
  protected $id;

  /**
   * @ManyToOne(targetEntity="\models\entities\PlayerCharacter")
   * @var PlayerCharacter
   */
  protected $player;

  /**
   * @Column(type="datetime")
   * @var \DateTime
   */
  protected $time;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $message;

  /**
   * @param string $message
   */
  public function setMessage($message) {
    $this->message = $message;
  }

  /**
   * @return string
   */
  public function getMessage() {
    return $this->message;
  }

  /**
   * @param \models\entities\PlayerCharacter $player
   */
  public function setPlayer($player) {
    $this->player = $player;
  }

  /**
   * @return \models\entities\PlayerCharacter
   */
  public function getPlayer() {
    return $this->player;
  }

  /**
   * @param \DateTime $time
   */
  public function setTime($time) {
    $this->time = $time;
  }

  /**
   * @return \DateTime
   */
  public function getTime() {
    return $this->time;
  }


}