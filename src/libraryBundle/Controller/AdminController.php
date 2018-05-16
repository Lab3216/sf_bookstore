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
use libraryBundle\Entity\Category;

use libraryBundle\Form\BookType;
use libraryBundle\Form\ImageType;
use libraryBundle\Form\CategoryType;

/**
* Controller for the admin user actions
* @author Sami Metoui <samimetoui@gmail.com>
*
*/
class AdminController extends Controller {


  /**
  * Edit book and modify it
  * @param Request $request
  * @param Book $book
  *
  * @return string
  *
  */
  public function editAction(Request $request, Book $book) {
    $em = $this->getDoctrine()->getEntityManager();
    $form = $this->createForm(BookType::class, $book);

    if($form->handleRequest($request)->isValid()) {

      /* Enregistre l'image et l'Ebook */
      if ($book->getImage()) {
        $book->getImage()->upload();
      }

      if ($book->getEbook()) {
        $book->getEbook()->upload();
      }

      $em->persist($book);
      $em->flush();

      return $this->redirect($this->generateUrl("library_edit_book", array(
        'id' => $book->getId(),
      )));

    }

    return $this->render('libraryBundle:Admin:book_edit.html.twig', array(
      'form' => $form->createView(),
      'book' => $book
    ));
  }


  /**
  * Add a book to the library
  * @param Request $request
  *
  * @return string
  *
  */
  public function addAction(Request $request) {
    $em = $this->getDoctrine()->getEntityManager();
    $book = new Book();
    $form = $this->createForm(BookType::class, $book);

    if($form->handleRequest($request)->isValid()) {

      /* Enregistre l'image et l'Ebook */
      $book->getImage()->upload();
      $book->getEbook()->upload();

      $em->persist($book);
      $em->flush();

      return $this->redirect($this->generateUrl("library_books"));

    }

    return $this->render('libraryBundle:Admin:book_add.html.twig', array(
      'form' => $form->createView()
    ));
  }


  /**
  * Remove a book from database
  * @param Book $book
  * @param Request $request
  *
  * @return string
  *
  */
  public function removeAction(Book $book, Request $request){

    $em = $this->getDoctrine()->getEntityManager();

    $em->remove($book);

    $em->flush();

    return $this->redirect($this->generateUrl("library_books"));
  }


  /**
  * List all books from library
  * @param Book $book
  * @param Request $request
  *
  * @return string
  *
  */
  public function booksAction() {
    $em = $this->getDoctrine()->getEntityManager();
    $books = $em->getRepository("libraryBundle:Book")->findAll();
    $categories = $em->getRepository("libraryBundle:Category")->findAll();

    return $this->render('libraryBundle:Admin:books_list.html.twig', array(
      'books' => $books,
      'categories' => $categories
    ));

  }


  /**
  * Add new category
  * @param Book $book
  * @param Request $request
  *
  * @return string
  *
  */
  public function addCategoryAction(Request $request) {
    $em = $this->getDoctrine()->getEntityManager();
    $category = new Category();
    $form = $this->createForm(CategoryType::class, $category);

    if($form->handleRequest($request)->isValid()) {

      $em->persist($category);
      $em->flush();

      return $this->redirect($this->generateUrl("library_categories"));
    }

    return $this->render('libraryBundle:Admin:category_add.html.twig', array(
      'form' => $form->createView()
    ));
  }


  /**
  * List all categories from library
  *
  * @return string
  *
  */
  public function categoriesAction() {
    $em = $this->getDoctrine()->getEntityManager();
    $categories = $em->getRepository("libraryBundle:Category")->findAll();

    return $this->render('libraryBundle:Admin:categories_list.html.twig', array(
      'categories' => $categories
    ));

  }


  /**
  * Edit category and modify it
  * @param Book $book
  * @param Request $request
  *
  * @return string
  *
  */
  public function editCategoryAction(Request $request, Category $category) {
    $em = $this->getDoctrine()->getEntityManager();
    $form = $this->createForm(CategoryType::class, $category);

    if($form->handleRequest($request)->isValid()) {

      $em->persist($category);
      $em->flush();

      return $this->redirect($this->generateUrl("library_edit_category", array(
        'id' => $category->getId(),
      )));

    }

    return $this->render('libraryBundle:Admin:category_edit.html.twig', array(
      'form' => $form->createView(),
      'category' => $category
    ));
  }

}
