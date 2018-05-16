<?php

namespace libraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Author
*
* @ORM\Table(name="author")
* @ORM\Entity(repositoryClass="libraryBundle\Repository\AuthorRepository")
*/
class Author {
  /**
  * @var int
  *
  * @ORM\Column(name="id", type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  /**
  * @var string
  *
  * @ORM\Column(name="firstname", type="string", length=255)
  */
  private $firstname;

  /**
  * @var string
  *
  * @ORM\Column(name="lastname", type="string", length=255)
  */
  private $lastname;

  /**
  * @var string
  *
  * @ORM\Column(name="summary", type="string", length=255)
  */
  private $summary;


  /**
  * Get id
  *
  * @return int
  */
  public function getId()
  {
    return $this->id;
  }

  /**
  * Set firstname
  *
  * @param string $firstname
  *
  * @return Author
  */
  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;

    return $this;
  }

  /**
  * Get firstname
  *
  * @return string
  */
  public function getFirstname()
  {
    return $this->firstname;
  }

  /**
  * Set lastname
  *
  * @param string $lastname
  *
  * @return Author
  */
  public function setLastname($lastname)
  {
    $this->lastname = $lastname;

    return $this;
  }

  /**
  * Get lastname
  *
  * @return string
  */
  public function getLastname()
  {
    return $this->lastname;
  }

  /**
  * Set summary
  *
  * @param string $summary
  *
  * @return Author
  */
  public function setSummary($summary)
  {
    $this->summary = $summary;

    return $this;
  }

  /**
  * Get summary
  *
  * @return string
  */
  public function getSummary()
  {
    return $this->summary;
  }

  /**
  * __toString()
  *
  * @return string
  */
  public function __toString() {
    return $this->firstname . ' ' . $this->lastname;
  }
}
