<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models;

/**
 * A user account for the game.
 *
 * @Entity
 * @package models
 */
class User {
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
  protected $email_address;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $password_hash;

  /**
   * @Column(type="boolean")
   * @var bool
   */
  protected $verbose_mode_on = true;

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $email_address
   */
  public function setEmailAddress($email_address) {
    $this->email_address = $email_address;
  }

  /**
   * @return string
   */
  public function getEmailAddress() {
    return $this->email_address;
  }

  /**
   * Sets the password to a new value, storing it in password_hash after doing the hashing.
   *
   * @param $password
   */
  public function setPassword($password) {
    $this->setPasswordHash(crypt($password));
  }

  /**
   * @param string $password_hash
   */
  public function setPasswordHash($password_hash) {
    $this->password_hash = $password_hash;
  }

  /**
   * @return string
   */
  public function getPasswordHash() {
    return $this->password_hash;
  }

  /**
   * @param boolean $verbose_mode_on
   */
  public function setVerboseModeOn($verbose_mode_on) {
    $this->verbose_mode_on = $verbose_mode_on;
  }

  /**
   * Alias for getVerboseModeOn() for more readable boolean methods.
   *
   * @return bool
   */
  public function isVerboseModeOn() {
    return $this->getVerboseModeOn();
  }

  /**
   * @return boolean
   */
  public function getVerboseModeOn() {
    return $this->verbose_mode_on;
  }
}