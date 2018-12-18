<?php

namespace App\Form;

use App\Entity\Qcm;
use App\Entity\Theme;
use App\Entity\Classroom;

use App\Form\QuestionType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class QcmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('classrooms', EntityType::class, array(
            //     'class'=>Classroom::class,
            //     'choice_label'=>'name',
            //     'label'=>'Classe',
            // ))
            ->add('theme', EntityType::class, array(
                'class'=>Theme::class,
                'choice_label'=>'name',
                'label'=>'Thème',
            ))

            ->add('question',
                CollectionType::class,
                [
                    'entry_type' => QuestionType::class,
                    'allow_add' => true,
                    // 'entry_options'=>array('label'=>false),
                    // 'prototype'=>true,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Qcm::class,
        ]);
    }
}
