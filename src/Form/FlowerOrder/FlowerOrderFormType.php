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
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('name', TextType::class, [
                'label' => 'Flower name',
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('deliverOn', TextType::class, [
                'label' => 'Delivery time',
                'attr' => ['autocomplete' => 'off']
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
