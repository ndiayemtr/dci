<?php

namespace DCI\DciBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class IndicateurType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('reference')
                ->add('typeIndicateur', ChoiceType::class, [
                    'choices' => [
                        'Importations' => 'Importations',
                        'Production' => 'Production',
                        'Exportations' => 'Exportations',
                        'Consommation' => 'Consommation',
                    ],
                ])
                ->add('categorie', ChoiceType::class, [
                    'choices' => [
                        'Accessibilité' => 'Accessibilité',
                        'Sécurité' => 'Sécurité',
                        'Qualité' => 'Qualité',
                        'Environnement' => 'Environnement',
                    ],
                ])
                ->add('sousCategorie', ChoiceType::class, [
                    'choices' => [
                        '' => '',
                    ],
                ])
                ->add('libelle')
                ->add('typeData')
                ->add('unite')
                ->add('mode')
                ->add('niveau', ChoiceType::class, [
                    'choices' => [
                        'Departemental' => 'Departemental',
                        'Regionale' => 'Regionale',
                        'Nationnal' => 'Nationnal',
                    ],
                ])
                ->add('periodicite')
                ->add('dateIndi');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'DCI\DciBundle\Entity\Indicateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'dci_dcibundle_indicateur';
    }

}
