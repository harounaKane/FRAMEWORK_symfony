<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ArticleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                "label" => "Libellé",
                "attr" => [
                    "placeholder" => "ex: Ordinateur"
                ],
                "help" => "procédure de la saisie de l'input"
            ])
            ->add('description', TextareaType::class, [
                "constraints" => [
                    new Length([
                        "min" => 10,
                        "minMessage" => "Description trop courte"
                    ])
                ]
            ])
            ->add('prix')
            // ->add('quantity', TextType::class, [
            //     "mapped" => false
            // ])
            // ->add('Valider', SubmitType::class)
            // ->add('Brouillon', SubmitType::class)

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
