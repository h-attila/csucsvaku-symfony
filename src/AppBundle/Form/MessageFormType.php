<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Név',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Név'
                )
            ])
            ->add('email',EmailType::class, [
                'label' => 'E-mail cím',
                'attr' => array(
                    'placeholder' => 'email@cim.hu'
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
            ->add('message', TextareaType::class, [
                'label' => 'Megjegyzés',
                'attr' => array(
                    'placeholder' => 'Írd ide az üzenetet...'
                ),
                'required' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_message_form_type';
    }
}
