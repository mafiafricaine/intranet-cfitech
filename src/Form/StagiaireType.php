<?php

namespace App\Form;

use App\Entity\Stagiaire;
use DateTime;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('genre', ChoiceType::class, [
                'choices' => [
                    'Femme' => 'Femme',
                    'Homme' => 'Homme',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('nom')
            ->add('prenom')
            ->add('dateDeNaissance', TypeDateType::class, array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-100),
                'months' => range(1, 12),
                'days' => range(1, 31),
              ))
            ->add('paysDeNaissance')
            ->add('lieuDeNaissance')
            ->add('nationalite')
            ->add('adresse')
            ->add('codePostal')
            ->add('commune')
            ->add('province', ChoiceType::class, [
                'choices' => [
                    'Bruxelles' => 'Bruxelles',
                    'Brabant Wallon' => 'Brabant Wallon',
                    'Brabant Flamand' => 'Brabant Flamand',
                    'Anvers' => 'Anvers',
                    'Liège' => 'Liège',
                    'Limbourg' => 'Limbourg',
                    'Flandre-Orientale' => 'Flandre-Orientale',
                    'Flandre-Occidentale' => 'Flandre-Occidentale',
                    'Hainaut' => 'Hainaut',
                    'Luxembourg' => 'Luxembourg',
                    'Namur' => 'Namur',
                ],
            ])
            ->add('pays')
            ->add('gsm')
            ->add('ligneFixe')
            ->add('email')
            ->add('registreNational')
            ->add('fraisDeDeplacement', ChoiceType::class, [
                'choices' => [
                    'STIB' => 'STIB',
                    'SNCB' => 'SNCB',
                    'Auto/Vélo' => 'Auto/Vélo',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('compteBancaireIBAN')
            ->add('cess', ChoiceType::class, [
                'choices' => [
                    'Non' => '0',
                    'Oui' => '1',
                ],
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Chomage' => 'Chomage',
                    'CPAS' => 'CPAS',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('inscrit')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
