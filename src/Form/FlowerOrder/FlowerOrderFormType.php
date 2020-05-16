<?php

declare(strict_types=1);

namespace App\Form\FlowerOrder;

use App\Entity\Order\FlowerOrder;
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
                'attr' => ['class' => 'form-control']
            ])
            ->add('name', TextType::class, [
                'label' => 'Flower name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('deliver_on', TextType::class, [
                'label' => 'Delivery time',
                'attr' => ['class' => 'form-control', 'readonly' => 'readonly']
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
