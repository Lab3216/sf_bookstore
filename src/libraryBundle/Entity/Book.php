<?php

namespace libraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
* Book
*
* @ORM\Table(name="book")
* @ORM\Entity(repositoryClass="libraryBundle\Repository\BookRepository")
*/
class Book
{
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
  * @ORM\Column(name="title", type="string", length=255)
  */
  private $title;

  /**
  * @var string
  *
  * @ORM\Column(name="summary", type="string", length=255)
  */
  private $summary;

  /**
  * @var string
  *
  * @ORM\Column(name="isbn", type="string", length=255, nullable=true)
  */
  private $isbn;

  /**
   * @ORM\OneToOne(targetEntity="libraryBundle\Entity\Image", cascade={"persist"})
   */
  private $image;

  /**
   * @ORM\OneToOne(targetEntity="libraryBundle\Entity\Ebook", cascade={"persist"})
   */
  private $ebook;

  /**
  * @var string
  *
  * @ORM\Column(name="author", type="string", length=255)
  */
  private $author;

  /**
  * @var string
  *
  * @ORM\Column(name="publisher", type="string", length=255, nullable=true)
  */
  private $publisher;

  /**
  *
  * @ORM\ManyToMany(targetEntity="libraryBundle\Entity\Category", cascade={"persist"})
  */
  private $categories;

  // Comme la propriété $categories doit être un ArrayCollection,
  // On doit la définir dans un constructeur :
  public function __construct()
  {
    $this->categories = new ArrayCollection();
  }

  // Notez le singulier, on ajoute une seule catégorie à la fois
  public function addCategory(Category $category)
  {
    // Ici, on utilise l'ArrayCollection vraiment comme un tableau
    $this->categories[] = $category;
  }

  public function removeCategory(Category $category)
  {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
    $this->categories->removeElement($category);
  }

  // Notez le pluriel, on récupère une liste de catégories ici !
  public function getCategories()
  {
    return $this->categories;
  }


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
  * Set title
  *
  * @param string $title
  *
  * @return Book
  */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
  * Get title
  *
  * @return string
  */
  public function getTitle()
  {
    return $this->title;
  }

  /**
  * Set summary
  *
  * @param string $summary
  *
  * @return Book
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
  * Set isbn
  *
  * @param string $isbn
  *
  * @return Book
  */
  public function setIsbn($isbn)
  {
    $this->isbn = $isbn;

    return $this;
  }

  /**
  * Get isbn
  *
  * @return string
  */
  public function getIsbn()
  {
    return $this->isbn;
  }



    /**
     * Set image
     *
     * @param \libraryBundle\Entity\Image $image
     *
     * @return Book
     */
    public function setImage(\libraryBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \libraryBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set ebook
     *
     * @param \libraryBundle\Entity\Ebook $ebook
     *
     * @return Book
     */
    public function setEbook(\libraryBundle\Entity\Ebook $ebook = null)
    {
        $this->ebook = $ebook;

        return $this;
    }

    /**
     * Get ebook
     *
     * @return \libraryBundle\Entity\Ebook
     */
    public function getEbook()
    {
        return $this->ebook;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     *
     * @return Book
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }
}
