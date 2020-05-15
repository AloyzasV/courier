<?php

declare(strict_types=1);

namespace App\Form\FlowerOrder;

use App\Entity\FlowerOrder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class FlowerOrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('address', TextType::class, [
                'label' => 'Delivery address',
            ])
            ->add('name', TextType::class, [
                'label' => 'Flower name',
            ])
            ->add('deliver_on', DateTimeType::class, [
                'label' => 'Delivery time',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FlowerOrder::class,
        ]);
    }
}
