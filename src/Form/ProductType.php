<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, array(
                'choices' => [
                 'Plat' => 'dishes',
                 'Dessert' => 'dessert',  
                 'Boisson' => 'drink',
                 'Topping' => 'topping',
                 ],
            ))
            ->add('garnish', ChoiceType::class, array(
               'choices' => [
                '' => null,
                'Boeuf' => 'beef',
                'Poulet' => 'chicken',
                'Poulet et crevette' => 'chicken and shrimp',   
                'Tofu' => 'tofu',
                'Mortadelle' => 'mortadella',
                ],
            ))
            ->add('image', FileType::class, [
                'required' => false
            ])
            ->add('description', TextareaType::class)
            ->add('price', MoneyType::class)
            ->add('status', ChoiceType::class, array(
               'choices' => [
                'Actif' => 'active',
                'Inatif' => 'inative',  
                ],
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Product::class,
        ]);
    }
}


