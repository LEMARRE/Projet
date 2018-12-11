<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
    private function getConfiguration($label, $placeholder){
        return [
            'label'=>$label,
            'attr'=> ['placeholder'=>$placeholder]
        ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, $this->getConfiguration("nom d'utilisateur", "Votre nom d'utilisateur"))
            ->add('email', EmailType::class, $this->getConfiguration("Email", "Votre email"))
            ->add('password', PasswordType::class, $this->getConfiguration("Mot de passe", "Votre mot de passe"));
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
