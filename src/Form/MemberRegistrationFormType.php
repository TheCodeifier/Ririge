<?php

namespace App\Form;

use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('loginname')
            ->add('password', null, ['label' => 'Brand', 'label_attr' => ['class' => 'tBox1'],])
            ->add('first_name', null, ['label' => 'Brand', 'label_attr' => ['class' => 'tBox2'],])
            ->add('last_name', null, ['label' => 'Brand', 'label_attr' => ['class' => 'tBox3'],])
            ->add('date_of_birth', null, ['label' => 'Brand', 'label_attr' => ['class' => 'tBox4'],])
            ->add('street',null, ['label' => 'Brand', 'label_attr' => ['class' => 'tBox6'],])
            ->add('place',null, ['label' => 'Brand', 'label_attr' => ['class' => 'tBox7'],])
            ->add('submit', SubmitType::class, ['attr' => ['class' => 'subButton position-relative border border-black rounded-0']]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
