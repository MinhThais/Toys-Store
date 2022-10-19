<?php

namespace App\Form;

use App\Entity\Shop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddShopManageType extends AbstractType{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Shop::class
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Shopname', TextType::class, [
                'label' => 'Shop Name'
            ])
            ->add('Email', TextType::class, [
                'label' => 'Email'
            ])
            ->add('Telephone', TextType::class, [
                'label' => 'Telephone'
            ])
            ->add('Address', TextType::class, [
                'label' => 'Address'
            ])
            
            ->add('save', SubmitType::class, [
                'label' => "Save"
            ]);
    }
}

?>