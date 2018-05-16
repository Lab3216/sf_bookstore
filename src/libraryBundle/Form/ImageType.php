<?php

namespace libraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;



class ImageType extends AbstractType {
public function buildForm(FormBuilderInterface $builder, array $options)
{
  $builder
  ->add('file', FileType::class, array(
    'label' => ' ',
    'required' => false
  ));
}

public function configureOptions(OptionsResolver $resolver)
{
  $resolver->setDefaults(array(
    'data_class' => 'libraryBundle\Entity\Image'
  ));
}

   /**
  * @return string
  */
   public function getName() {
    return 'librarybundle_image';
  }
}
