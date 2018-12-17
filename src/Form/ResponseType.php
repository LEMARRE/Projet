<?php

namespace App\Form;

use App\Entity\Choice;
use App\Form\ResponseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ResponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('choice', TextareaType::class, [
                'attr'=>['placeholder'=>"Votre réponse"]
            ])
            ->add('response', CheckboxType::class, [
                'label'=>'Vrai',
            ] );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Choice::class,
        ]);
    }
}
