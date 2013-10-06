<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities;

/**
 * All Characters are either NonPlayerCharacters or PlayerCharacters, but not all GameEntity objects are Characters. This
 * defines functionality common to those two children classes.
 *
 * @package models\entities
 */
class Character extends GameEntity {
  /**
   * @Column(type="integer")
   * @var int
   */
  protected $gender = 0;

  const GENDER_NEUTER = 0; // "it" and "its"
  const GENDER_MALE = 1; // "he" and "his"
  const GENDER_FEMALE = 2; // "she" and "her"
  const GENDER_QUEER = 3; // "zhe" and "zir"

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $strength = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $intellect = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $dexterity = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $charisma = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $luck = 100;

  public function getPronoun() {
    switch($this->gender) {
      case self::GENDER_MALE:
        return "he";
      case self::GENDER_FEMALE:
        return "she";
      case self::GENDER_QUEER:
        return "zhe";
      default:
        return "it";
    }
  }

  public function getPossessivePronoun() {
    switch($this->gender) {
      case self::GENDER_MALE:
        return "his";
      case self::GENDER_FEMALE:
        return "her";
      case self::GENDER_QUEER:
        return "zir";
      default:
        return "its";
    }
  }

  /**
   * @param int $charisma
   */
  public function setCharisma($charisma) {
    $this->charisma = $charisma;
  }

  /**
   * @return int
   */
  public function getCharisma() {
    return $this->charisma;
  }

  /**
   * @param int $dexterity
   */
  public function setDexterity($dexterity) {
    $this->dexterity = $dexterity;
  }

  /**
   * @return int
   */
  public function getDexterity() {
    return $this->dexterity;
  }

  /**
   * @param int $intellect
   */
  public function setIntellect($intellect) {
    $this->intellect = $intellect;
  }

  /**
   * @return int
   */
  public function getIntellect() {
    return $this->intellect;
  }

  /**
   * @param int $luck
   */
  public function setLuck($luck) {
    $this->luck = $luck;
  }

  /**
   * @return int
   */
  public function getLuck() {
    return $this->luck;
  }

  /**
   * @param int $strength
   */
  public function setStrength($strength) {
    $this->strength = $strength;
  }

  /**
   * @return int
   */
  public function getStrength() {
    return $this->strength;
  }
}