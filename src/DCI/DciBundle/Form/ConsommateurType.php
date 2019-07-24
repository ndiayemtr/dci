<?php

namespace DCI\DciBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConsommateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('typeConsommateur', ChoiceType::class, [
                    'choices' => [
                        'Etat' => 'Etat',
                        'Entreprise' => 'Entreprise',
                        'Ong' => 'Ong',
                        'Menage' => 'Menage',
                    ],
                ])
                ->add('libelle')
                ->add('quantiteUtiliser')
                ->add('marchandise');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DCI\DciBundle\Entity\Consommateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dci_dcibundle_consommateur';
    }


}
