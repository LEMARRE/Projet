<?php

namespace App\Form;

use App\Entity\Questions;
use App\Form\ResponseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', TextareaType::class, [
                'attr'=>['placeholder'=>"Votre question"]
            ])
            ->add('experience', IntegerType::class, [
                'attr'=>['placeholder'=>"Points"]
            ])

            ->add(
                'choice',
                CollectionType::class,
                [
                    'entry_type' => ResponseType::class,
                    'allow_add' => true,
                    'entry_options'=>array('label'=>false),
                    'prototype'=>true,
                    'block_name' => 'choice',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Questions::class,
        ]);
    }
}
