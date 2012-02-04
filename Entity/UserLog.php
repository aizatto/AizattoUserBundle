<?php

namespace Aizatto\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class UserLog
{
  /**
   * @var integer $id
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var datetime $created_at
   *
   * @ORM\Column(name="created_at", type="datetime")
   */
  protected $created_at;

  /**
   * @var User $user
   *
   * @ORM\ManyToOne(targetEntity="User")
   */
  protected $user;

  /**
   * @var string $type
   *
   * @ORM\Column(name="type", type="string", length=255)
   */
  protected $type;

  /**
   * @var bigint $type_id
   *
   * @ORM\Column(name="type_id", type="bigint", nullable="true")
   */
  protected $type_id;

  /**
   * @var text $message
   *
   * @ORM\Column(name="message", type="text")
   */
  protected $message;

  /**
   * @var string $session_id
   *
   * @ORM\Column(name="session_id", type="string")
   */
  protected $session_id;

  /**
   * @var integer 
   *
   * @ORM\Column(name="ip_address", type="integer")
   */
  protected $ip_address;

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set created_at
   *
   * @param datetime $createdAt
   */
  public function setCreatedAt($createdAt)
  {
    $this->created_at = $createdAt;
    return $this;
  }

  /**
   * Get created_at
   *
   * @return datetime 
   */
  public function getCreatedAt()
  {
    return $this->created_at;
  }

  /**
   * Set user
   *
   * @param $user
   */
  public function setUser($user)
  {
    $this->user = $user;
    return $this;
  }

  /**
   * Get user
   *
   * @return
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * Set type
   *
   * @param string $type
   */
  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }

  /**
   * Get type
   *
   * @return string 
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set type_id
   *
   * @param bigint $typeId
   */
  public function setTypeId($typeId)
  {
    $this->type_id = $typeId;
    return $this;
  }

  /**
   * Get type_id
   *
   * @return bigint 
   */
  public function getTypeId()
  {
    return $this->type_id;
  }

  /**
   * Set message
   *
   * @param text $message
   */
  public function setMessage($message)
  {
    $this->message = $message;
    return $this;
  }

  /**
   * Get message
   *
   * @return text 
   */
  public function getMessage()
  {
    return $this->message;
  }

  /**
   * Set ip_address
   *
   * @param string $ipAddress
   */
  public function setIpAddress($ipAddress)
  {
    $this->ip_address = $ipAddress;
    return $this;
  }

  /**
   * Get ip_address
   *
   * @return string 
   */
  public function getIpAddress()
  {
    return $this->ip_address;
  }


  /**
   * Set session_id
   *
   * @param string $sessionId
   */
  public function setSessionID($sessionId)
  {
    $this->session_id = $sessionId;
    return $this;
  }

  /**
   * Get session_id
   *
   * @return string 
   */
  public function getSessionID()
  {
    return $this->session_id;
  }

}
