<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Név',
                'attr' => array(
                    'placeholder' => 'Név'
                ),
                'required' => true
            ])
            ->add('phone', TextType::class, [
                'label' => 'Telefonszám',
                'attr' => array(
                    'placeholder' => 'Telefonszám'
                ),
                'required' => false
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail cím',
                'attr' => array(
                    'placeholder' => 'email@cim.hu'
                ),
                'required' => true
            ])
            ->add('deliveryAdress', TextType::class, [
                'label' => 'Szállítási cím',
                'attr' => array(
                    'placeholder' => 'Szállítási cím'
                ),
                'required' => true
            ])
            ->add('deliveryMode', ChoiceType::class, [
                'choices' => [
                    'Személyes átvétel (egyeztetés után, Bp és környékén)' => 'személyes átvétel',
                    'Foxpost csomagautomata (1-2 munkanap)' => 'foxpost',
                    'DPD futárszolgálat (2-3 munkanap)' => 'dpd',
                    'MPL - postai csomag (1-2 munkanap)' => 'posta'
                ],
                'label' => 'Szállítási mód',
                'data' => 'szemelyes',
                'required' => true
            ])
            ->add('quantity', ChoiceType::class, [
                'choices' => [
                    '1 darab' => 1,
                    '2 darab' => 2,
                    '3 darab' => 3,
                    '4 darab' => 5,
                    '5 darab' => 5,
                ],
                'label' => 'Mennyiség',
                'data' => 1,
                'required' => true
            ])
            ->add('invoice', TextType::class, [
                'label' => 'Számlázási cím',
                'attr' => array(
                    'placeholder' => 'Számlázási cím'
                ),
                'required' => false
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Megjegyzés',
                'attr' => array(
                    'placeholder' => 'Bármi, amit fontosnak tartasz... (pl. szállítással kapcsolatos egyedi kérés)'
                ),
                'required' => false
            ])
            ->add('warranty', ChoiceType::class, [
                'choices' => [
                    '12 hónap garancia - DÍJMENTES' => '12 hónap',
                    '12 + 12 hónap kiterjesztett garancia (2990 Ft)' => '24 hónap',
                    '12 + 24 hónap kiterjesztett garancia (3990 Ft)' => '36 hónap'
                ],
                'data' => '12 hónap',
                'label' => 'Garancia kiterjesztése',
                'expanded' => true,
                'required' => true
            ])
            ->add('terms', ChoiceType::class, [
                'choices' => [
                    ' Elfogadom a felhasználási feltételeket' => true,
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => false,
                'required' => true
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_order_form_type';
    }
}
