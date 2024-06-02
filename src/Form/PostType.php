<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'Título',
                ],
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'Descripción',
                    'rows' => '10',
                    'cols' => '80',
                ],
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-input',
                ],
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-input',
                ],
            ])
            ->add('url_img', TextareaType::class, [
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'URL de la imagen',
                    'rows' => '2',
                    'cols' => '80',
                ],
            ])
            ->add('img_path', TextareaType::class, [
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'Ruta de la imagen',
                    'rows' => '2',
                    'cols' => '80',
                ],
            ])
            ->add('link', TextareaType::class, [
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'Enlace',
                    'rows' => '2',
                    'cols' => '80',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
