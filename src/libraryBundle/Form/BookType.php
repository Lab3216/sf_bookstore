<?php
namespace libraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use libraryBundle\Entity\Author;
use libraryBundle\Entity\Category;
use libraryBundle\Form\ImageType;
use libraryBundle\Form\EbookType;


class BookType extends AbstractType {

  /**
  * @param FormBuilderInterface $builder
  * @param array $options
  */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
    ->add('title', TextType::class)
    ->add('summary', TextareaType::class, array(
      // 'required' => false,
    ))
    ->add('isbn', TextType::class, array(
      'required' => false,
    ))
    ->add('publisher', TextType::class)
    ->add('author',TextType::class)

    // ->add('categories', CollectionType::class, array(
    //       'entry_type'   => CategoryType::class,
    //       'allow_add'    => true,
    //       'allow_delete' => true
    //     ))

    ->add('categories', EntityType::class, array(
      'class'   => Category::class,
      'choice_label' => 'name',
      'multiple'     => true,
      'expanded' => true,
    ))

    ->add('image', ImageType::class)
    ->add('ebook', EbookType::class)
    ;
  }

  /**
  * @param OptionsResolverInterface $resolver
  */
  public function setDefaultOptions(OptionsResolverInterface $resolver) {
    $resolver->setDefaults(array(
      'data_class' => 'libraryBundle\Entity\Book'
    ));
  }

  /**
  * @return string
  */
  public function getName() {
    return 'librarybundle_book';
  }

}
