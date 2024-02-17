<?php

namespace App\Form;

use App\Entity\Voyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\Expression;



class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Programme', TextareaType::class, [
            'attr' => ['rows' => 3],
        ])
        ->add('DateDepart', DateType::class, [
            'widget' => 'single_text',
        ])
        ->add('DateArrive', DateType::class, [
            'widget' => 'single_text',
            'constraints' => [
                new Expression([
                    'expression' => 'this.getParent()["DateDepart"].getData() < value',
                    'message' => 'Arrival date must be after the departure date.'
                ]),
            ],
        ])
        ->add('Prix')
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
