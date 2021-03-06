<?php

declare(strict_types=1);

namespace App\Form\CoffeeOrder;

use App\Entity\Order\CoffeeOrder;
use App\Entity\CupSize;
use App\Entity\MilkType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CoffeeOrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('milk', ChoiceType::class, [
                'label' => 'Coffee with milk',
                'choices' => ['No' => 0, 'Yes' => 1],
                'expanded' => true,
                'data' => 0
            ])
            ->add('milkType', EntityType::class, [
                'label' => 'Milk type',
                'class' => MilkType::class,
                'multiple' => false,
                'expanded' => false,
                'choice_label' => function(MilkType $milkType) {
                    return $milkType->getName();
                },
                'placeholder' => 'Choose',
                'required' => false,
                'row_attr' => [
                    'class' => 'milk-type-group'
                ],
                'label_attr' => ['class' => 'required']
            ])
            ->add('cupSize', EntityType::class, [
                'label' => 'Cup size',
                'class' => CupSize::class,
                'multiple' => false,
                'expanded' => false,
                'choice_label' => function(CupSize $cupSize) {
                    return $cupSize->getName();
                },
                'placeholder' => 'Choose'
            ])
            ->add('location', TextType::class, [
                'label' => 'Select delivery location on map',
                'attr' => array('hidden' => 'hidden'),
                'required' => false,
                'label_attr' => ['class' => 'required']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CoffeeOrder::class,
        ]);
    }
}
