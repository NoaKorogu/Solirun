<?php

namespace App\Form;

use App\Entity\Course;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Course1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Utilisation du type DateType pour la date
            ->add('date', DateType::class, [
                'label' => 'Date',
                'required' => true,
            ])
            // Utilisation du type TimeType pour l'heure de début et de fin
            ->add('h_debut', TimeType::class, [
                'label' => 'Heure de début',
                'required' => true,
                'widget' => 'single_text',
            ])
            ->add('h_fin', TimeType::class, [
                'label' => 'Heure de fin',
                'required' => true,
                'widget' => 'single_text',
            ])
            // Utilisation de TextType pour le nom
            ->add('nom', TextType::class, [
                'label' => 'Nom de la course',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }
}