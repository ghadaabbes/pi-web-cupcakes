<?php
/**
 * Created by PhpStorm.
 * User: Siala
 * Date: 23/12/2017
 * Time: 18:17
 */

namespace RecetteBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class rechercheRecetteForm extends AbstractType
{/**
 * {@inheritdoc}
 */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('valider',SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {

    }
    public function getName(){
        return 'recettebundlerecherche_recette_form';
    }

}