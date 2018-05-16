<?php
namespace libraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use libraryBundle\Entity\Author;

class LoadAuthor implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms des auteurs à ajouter
    $names = array(
      array('Jean-Jacques', 'Rousseau','Né en ...'),
      array('Honoré', 'de Balzac','Né en ...'),
      array('Charles', 'Beaudelaires','Né en ...'),
      array('Guy', 'de Maupassant','Né en ...'),
      array('Henri Beyle', 'Standhal','Né en ...')
    );

    for($i=0;$i<5;$i++) {
      // On crée l'auteur
      $author = new Author();
      $author->setFirstname($names[$i][0]);
      $author->setLastname($names[$i][1]);
      $author->setSummary($names[$i][2]);

      // On la persiste
      $manager->persist($author);
    }

    // On déclenche l'enregistrement de tous les auteurs
    $manager->flush();
  }
}
