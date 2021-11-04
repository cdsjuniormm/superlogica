<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $inputClass = 'p-1 text-gray-500 w-10/12 float-right rounded border border-solid border-gray-300';
        $rowAttr = [
            'class' => 'm-1 w-3/5',
        ];

        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'minlength' => '3',
                    'maxlength' => '50',
                    'class' => $inputClass,
                    'placeholder' => 'Name'
                ],
                'row_attr' => $rowAttr
            ])
            ->add('userName', TextType::class, [
                'attr' => [
                    'minlength' => '3',
                    'maxlength' => '50',
                    'class' => $inputClass,
                    'placeholder' => 'username',
                    'onkeyup' => 'removeSpace(event, this)'
                ],
                'row_attr' => $rowAttr
            ])
            ->add('zipCode', TextType::class, [
                'attr' => [
                    'pattern' => '.{9}',
                    'maxlength' => '9',
                    'class' => $inputClass." cep",
                    'placeholder' => '00000-00'
                ],
                'row_attr' => $rowAttr
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'minlength' => '7',
                    'maxlength' => '255',
                    'class' => $inputClass,
                    'placeholder' => 'example@email.com'
                ],
                'row_attr' => $rowAttr
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'minlength' => '8',
                    'maxlength' => '100',
                    'class' => $inputClass,
                    'placeholder' => 'The password must contain at least one letter and one number.'
                ],
                'row_attr' => $rowAttr
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
