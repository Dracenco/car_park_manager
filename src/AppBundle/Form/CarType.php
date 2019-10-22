<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('make')
				->add('model')
				->add('year')
				->add('consumption')
				->add('km')
				->add('lastTechInspection',DateType::class,['widget'=>'choice','format'=>'yyyy-MM-dd'])
				->add('priceTechInspection')
				->add("Submit",SubmitType::class, [
					'attr' => ['class' => 'btn btn-success submit-button'],
				]);
    }
//$builder->add(
//'beginDate',
//'datetime',
//array(
//'widget' => 'single_text',
//'format' => 'yyyy-MM-dd  HH:mm'
//)
//)
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Car'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_car';
    }


}
