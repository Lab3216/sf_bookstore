<?php

namespace libraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use libraryBundle\Entity\Category;


class CategoryType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('name', TextType::class, array(
      'required' => false
    ))

    ->add('summary', TextareaType::class, array(
      'required' => false
    ))

    // ->add('name', EntityType::class, array(
    //   'class' => Category::class,
    // ))
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'libraryBundle\Entity\Category'
    ));
  }

  /**
  * @return string
  */
  public function getName() {
    return 'librarybundle_category';
  }
}
