<?php

namespace App\Form;

use App\Entity\Items;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('startingPrice')
            ->add('reservePrice')
            ->add('buyoutPrice')
            ->add('startTime')
            ->add('endTime')
            ->add('status')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('category')
            ->add('seller')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Items::class,
        ]);
    }
}
