<?php

namespace DCI\DciBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddMarchandiseType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('reference')->add('stade', ChoiceType::class, [
            'choices' => [
                'Manufacturé' => 'Manufacturé',
                'Intermédiaire' => 'Intermédiaire',
                'Brut' => 'Brut',
            ],
        ])->add('origine', ChoiceType::class, [
            'choices' => [
                'Local' => 'Local',
                'Import' => 'Import',
            ],
        ])->add('libelle')->add('dateMarchandise')->add('typeMarchandise', ChoiceType::class, [
            'choices' => [
                'Conditionnement' => 'Conditionnement',
                'Emballage' => 'Emballage',
            ],
        ])->add('departement');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'DCI\DciBundle\Entity\Marchandise'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'dci_dcibundle_marchandise';
    }

}
