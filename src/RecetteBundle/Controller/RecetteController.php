<?php

namespace RecetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

use AcceuilBundle\Entity\Recette;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use RecetteBundle\Repository\RecetteRepository;




use User\UserBundle\Entity\User;

class RecetteController extends Controller
{     public function ajouterRecetteAction(Request $request)
    { $user = $this->getUser()->getId();
    $modele=new Recette();
    $Form=$this->createFormBuilder($modele)
        ->add('nom')
        ->add('nomImage',FileType::class,array('label'=>'insérer une image'))
        ->add('type',ChoiceType::class, array(
            'choices'  => array(
                'Biscuits'=> 'Biscuits',
                'Chocolat'=>'Chocolat',
                'Gateux et Entremets'=>'Gateux et Entremets',
                'Cremes et Confitures'=>'Cremes et Confitures',
                'Tartes'=>'Tartes',
                'Spécialités Tunisiennes'=>'Spécialités Tunisiennes',
                'Traiteur(salé)'=>'Traiteur(salé)',
                'Pains et Viennoiseries'=>'Pains et Viennoiseries',
                'Recettes de base'=>'Recettes de base',
                'Diététiques'=>'Diététiques',
            ),'multiple'=>false,
            'label'=>'Type de la recette',
            'expanded'=>false
        ))

        ->add('description',TextareaType::class)
        ->add('cout',ChoiceType::class, array(
            'choices'=>array('Pas cher'=>'Pas cher', 'Adorable'=>'Adorable', 'assez cher'=>'assez cher'),
            'multiple'=>false,
            'expanded'=>false,

        ))
        ->add('tempsPreparation',TimeType::class, array(
            'input'  => 'datetime',
            'widget' => 'choice',
        ))
        ->add('tempsRepos',TimeType::class, array(
            'input'  => 'datetime',
            'widget' => 'choice',
        ))
        ->add('tempsCuisson',TimeType::class, array(
            'input'  => 'datetime',
            'widget' => 'choice',
        ))
        ->add('nbPersonne',TextType::class)
        ->add('difficulte',ChoiceType::class, array(
            'choices'=>array('Facile'=>'Facile', 'Medium'=>'Medium', 'Difficile'=>'Difficile'),
            'multiple'=>false,
            'expanded'=>false,

        ))


        ->add('ingredients',TextareaType::class)
        ->add('etapes',TextareaType::class)
        ->add('astuces',TextareaType::class)
        ->add('iduser',EntityType::class, array(
            'class'=>'UserUserBundle:User',
            'choice_label'=>'username',
            'label'=>'Recette soussigné par:',
            'multiple'=>false,
            'expanded' => true,
            'required' => true,

            'query_builder' => function(EntityRepository $er) use ($user) {

                return $er->createQueryBuilder('u')->where('u.id = '.$user ); },



        ))

        ->add('Ajouter',SubmitType::class,array(
            'label' => 'Ajouter Maintenant',
            'attr'  => array(
                'class' => 'ps-btn',
            )))

        ->getForm();

    $Form->handleRequest($request);
    if($Form->isValid()){
        /**
         * @var UploadedFile $file
         */
        $file=$modele->getNomImage();
        $fileName=md5(uniqid()).'.'.$file->guessExtension();
        $file->move(
            $this->getParameter('images_directory'),
            $fileName
        );
        $modele->setNomImage($fileName);

;

        $em=$this->getDoctrine()->getManager();
        $em->persist($modele);
        $em->flush();
        return $this->redirectToRoute('ajouter_Recette');
    }
    return $this->render("RecetteBundle:Recette:ajouterRecette.html.twig",array('a'=>$Form->createView()));
}
    public function mesRecettesAction()
    {  $user = $this->getUser()->getId();
        $em=$this->getDoctrine()->getManager();
        $recette=$em->getRepository("AcceuilBundle:Recette")->findByiduser($user);

        return $this->render("RecetteBundle:Recette:mesRecettes.html.twig",array("r"=>$recette));

    }
}
