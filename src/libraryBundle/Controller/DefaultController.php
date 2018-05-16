<?php
/*
* This file is part of the sf_library.
*
* (c) Sami Metoui <samimetoui@chaqal.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace libraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use libraryBundle\Entity\Book;

use libraryBundle\Form\BookType;
use libraryBundle\Form\ImageType;

/**
* Controller for the standard user actions
* @author Sami Metoui <samimetoui@gmail.com>
*
*/
class DefaultController extends Controller {


  /**
  * Display all books from library
  *
  * @return string
  *
  */
  public function indexAction() {
    $em = $this->getDoctrine()->getEntityManager();
    $books = $em->getRepository("libraryBundle:Book")->findAll();
    $categories = $em->getRepository("libraryBundle:Category")->findAll();

    return $this->render('libraryBundle:Default:index.html.twig', array(
      'books' => $books,
      'categories' => $categories
    ));
  }


  /**
  * List books for the selected category
  * @param integer $id
  *
  * @return string
  *
  */
  public function categoryAction($id) {
    $em = $this->getDoctrine()->getEntityManager();
    $books = $em->getRepository("libraryBundle:Book")->findByCategories($id);
    $categories = $em->getRepository("libraryBundle:Category")->findAll();

    return $this->render('libraryBundle:Default:index.html.twig', array(
      'books' => $books,
      'categories' => $categories
    ));

  }

  /**
  * Preview a summary description of the book
  * @param integer $id
  *
  * @return string
  *
  */
  public function previewAction($id) {
    $em = $this->getDoctrine()->getEntityManager();
    $book = $em->getRepository("libraryBundle:Book")->find($id);


    return $this->render('libraryBundle:Default:preview.html.twig', array(
      'book' => $book
    ));
  }

}
