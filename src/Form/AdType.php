<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AdType extends AbstractType
{
    /**
     * Permet d'avoir la config de base d'un champ ! 
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder){
        return [
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
            ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getConfiguration("Titre", "Tapez un super titre pour votre annonce"))
            ->add('slug', TextType::class, $this->getConfiguration("slug", "Tapez un super slug pour votre annonce"))
            ->add('price', MoneyType::class, $this->getConfiguration("Prix par nuit", "Indiquez le prix pour une nuit"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Description global"))
            ->add('content', TextType::class, $this->getConfiguration("Description détaillée", "Description détaillé de l'annonce"))
            ->add('coverImage', UrlType::class, $this->getConfiguration("Url des images", "donner l'adresse web de l'image"))
            ->add('rooms', IntegerType::class, $this->getConfiguration("Nombre de chambres", "Nombre de chambres disponible"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
