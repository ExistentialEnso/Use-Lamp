<?php
/**
 * Contains the "NavigationMatrix" class definition.
 *
 * @package UseLamp
 * @copyright 2013 Portdusk Inc.
 * @license GPLv3
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */

namespace models\map;

/**
 * The "NavigationMatrix" class represents a set of navigation possibilities for a given Location. Events may trigger
 * a change in NavigationMatrices in a single location, though all locations must always have a matrix, even if all
 * directions are null.
 *
 * @Entity
 * @Table(name="navigationmatrix")
 * @package models\map
 */
class NavigationMatrix {
  /**
   * @Id
   * @GeneratedValue
   * @Column(type="integer")
   * @var integer
   */
  protected $id;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_north;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_northeast;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_northwest;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_east;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_west;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_south;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_southeast;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_southwest;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_in;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_out;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_up;

  /**
   * @ManyToOne(targetEntity="Location")
   * @var Location
   */
  protected $location_down;

  /**
   * The message to show when the user tries to go an invalid direction.
   *
   * @Column(type="string")
   * @var string
   */
  protected $invalid_direction_message = "You can't go that way.";

  /**
   * Gets the location for a given direction command.
   *
   * @param $direction
   * @return Location
   */
  public function getLocation($direction) {
    switch($direction) {
      case "w":
      case "west":
        return $this->getLocationWest();
      case "e":
      case "east":
        return $this->getLocationEast();
      case "n":
      case "north":
        return $this->getLocationNorth();
      case "s":
      case "south":
        return $this->getLocationSouth();
      case "sw":
      case "southwest":
        return $this->getLocationSouthWest();
      case "se":
      case "southeast":
        return $this->getLocationSouthEast();
      case "nw":
      case "northwest":
        return $this->getLocationNorthWest();
      case "ne":
      case "northeast":
        return $this->getLocationNorthEast();
      case "out":
        return $this->getDirectionOut();
      case "in":
        return $this->getDirectionIn();
      case "up":
        return $this->getDirectionUp();
      case "down":
        return $this->getDirectionDown();
      default:
        return null;
    }
  }

  /**
   * @param Location $location_east
   */
  public function setLocationEast($location_east) {
    $this->location_east = $location_east;
  }

  /**
   * @return Location
   */
  public function getLocationEast() {
    return $this->location_east;
  }

  /**
   * @param Location $location_north
   */
  public function setLocationNorth($location_north) {
    $this->location_north = $location_north;
  }

  /**
   * @return Location
   */
  public function getLocationNorth() {
    return $this->location_north;
  }

  /**
   * @param Location $location_northeast
   */
  public function setLocationNortheast($location_northeast) {
    $this->location_northeast = $location_northeast;
  }

  /**
   * @return Location
   */
  public function getLocationNortheast() {
    return $this->location_northeast;
  }

  /**
   * @param Location $location_northwest
   */
  public function setLocationNorthwest($location_northwest) {
    $this->location_northwest = $location_northwest;
  }

  /**
   * @return Location
   */
  public function getLocationNorthwest() {
    return $this->location_northwest;
  }

  /**
   * @param Location $location_south
   */
  public function setLocationSouth($location_south) {
    $this->location_south = $location_south;
  }

  /**
   * @return Location
   */
  public function getLocationSouth() {
    return $this->location_south;
  }

  /**
   * @param Location $location_southeast
   */
  public function setLocationSoutheast($location_southeast) {
    $this->location_southeast = $location_southeast;
  }

  /**
   * @return Location
   */
  public function getLocationSoutheast() {
    return $this->location_southeast;
  }

  /**
   * @param Location $location_southwest
   */
  public function setLocationSouthwest($location_southwest) {
    $this->location_southwest = $location_southwest;
  }

  /**
   * @return Location
   */
  public function getLocationSouthwest() {
    return $this->location_southwest;
  }

  /**
   * @param Location $location_west
   */
  public function setLocationWest($location_west) {
    $this->location_west = $location_west;
  }

  /**
   * @return Location
   */
  public function getLocationWest() {
    return $this->location_west;
  }

  /**
   * @param Location $location_down
   */
  public function setLocationDown($location_down) {
    $this->location_down = $location_down;
  }

  /**
   * @return Location
   */
  public function getLocationDown() {
    return $this->location_down;
  }

  /**
   * @param Location $location_in
   */
  public function setLocationIn($location_in) {
    $this->location_in = $location_in;
  }

  /**
   * @return Location
   */
  public function getLocationIn() {
    return $this->location_in;
  }

  /**
   * @param Location $location_out
   */
  public function setLocationOut($location_out) {
    $this->location_out = $location_out;
  }

  /**
   * @return Location
   */
  public function getLocationOut() {
    return $this->location_out;
  }

  /**
   * @param Location $location_up
   */
  public function setLocationUp($location_up) {
    $this->location_up = $location_up;
  }

  /**
   * @return Location
   */
  public function getLocationUp() {
    return $this->location_up;
  }

  /**
   * @param string $invalid_direction_message
   */
  public function setInvalidDirectionMessage($invalid_direction_message) {
    $this->invalid_direction_message = $invalid_direction_message;
  }

  /**
   * @return string
   */
  public function getInvalidDirectionMessage() {
    return $this->invalid_direction_message;
  }
}