<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'autofocus' => true, 
                    'class' => 'form-input',
                    'placeholder' => 'Email Address',
                ],
                'label' => 'Email Address',
                
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an email',
                    ]),
                ],
       
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'I agree terms',
                'attr' => [
                    'class' => 'form-input-checkbox-md',
                    'placeholder' => 'I agree to the terms and conditions',
                ],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('termsAgreement', TextType::class, [ // Campo para el enlace a las condiciones
                'mapped' => false,
                'required' => false,
                'label' => 'I agree to the terms and conditions.', // Cambia el texto según tus necesidades
                'attr' => [
                    'readonly' => true, // Para que el usuario no pueda modificar el enlace
                    'style' => 'border: none; background: none; color: blue; text-decoration: underline; cursor: pointer;',
                    'class' => 'terms-agreement-link',
                    'onclick' => "window.open('https://www.example.com/terms', '_blank')", // URL de tus condiciones
                ],
                'label_attr' => ['class' => 'terms-agreement-label'],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Password',
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-input',
                    'placeholder' => 'Password',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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
