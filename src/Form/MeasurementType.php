<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Date;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Measurement date',
            ])

            ->add('celsius', NumberType::class, [
                'label' => 'Temperature (Celcius)',
                'attr' => [
                    'placeholder' => 'Enter temperature',
                    'step' => '0.1',
                ],
            ])

            ->add('windspeed', NumberType::class, [
                'label' => 'Wind speed (km/h)',
                'attr' => [
                    'placeholder' => 'Enter wind speed',
                    'step' => '0.1',
                ],
            ])

            ->add('humidity', NumberType::class, [
                'label' => 'Humidity (%)',
                'attr' => [
                    'placeholder' => 'Enter humidity',
                    'min' => 0,
                    'max' => 100,
                ],
            ])

            ->add('pressure', NumberType::class, [
                'label' => 'Pressure (hPa)',
                'attr' => [
                    'placeholder' => 'Enter pressure',
                    'step' => '0.1',
                ],
            ])

            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'city',
                'placeholder' => 'Select a location',
                'label' => 'Location',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
