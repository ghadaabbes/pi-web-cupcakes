<?php

namespace RecetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

use AcceuilBundle\Entity\Recette;
use AcceuilBundle\Entity\Commentaire;
use AcceuilBundle\Entity\Vote;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Response;
use User\UserBundle\Entity\User;
use blackknight467\StarRatingBundle\Form\RatingType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
    public function afficherRecetteAction(Request $request,$id)
    {   $user = $this->getUser()->getId();
        $em=$this->getDoctrine()->getManager();
        $recette=$em->getRepository("AcceuilBundle:Recette")->find($id);

        $commentaire=$em->getRepository("AcceuilBundle:Commentaire")->findByidrecette($id);

        $modele=new Commentaire();



        $Form=$this->createFormBuilder($modele)

            ->add('comment',TextareaType::class)

            ->add('idrecette',EntityType::class,  array(
                'class'=>'AcceuilBundle:Recette',
                'choice_label'=>'nom',
                'multiple'=>false,
                'label'=>'J accepte et je Confirme ',
                'expanded' => true,
                'query_builder' => function(EntityRepository $er) use ($id) {

                    return $er->createQueryBuilder('u')->where('u.id = '.$id ); },

            ))
            ->add('iduser',EntityType::class, array(
                'class'=>'UserUserBundle:User',
                'choice_label'=>'username',
                'label'=>'Commentaire par:',
                'multiple'=>false,
                'expanded' => true,
                'required' => true,

                'query_builder' => function(EntityRepository $er) use ($user) {

                    return $er->createQueryBuilder('u')->where('u.id = '.$user ); },

            ))

            ->add('Ajouter',SubmitType::class)

            ->getForm();

        $Form->handleRequest($request);
        if($Form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('une_Recette',array('id'=>$id)); }


          //Vote
        $vote=new Vote();



        $Form2=$this->createFormBuilder($vote)

            ->add('rating', RatingType::class, [
                'label' => 'Noter la recette'
            ])

            ->add('idrecette',EntityType::class,  array(
                'class'=>'AcceuilBundle:Recette',
                'choice_label'=>'nom',
                'multiple'=>false,
                'label'=>'J accepte et je Confirme ',
                'expanded' => true,
                'query_builder' => function(EntityRepository $er) use ($id) {

                    return $er->createQueryBuilder('u')->where('u.id = '.$id ); },

            ))


            ->add('Valider',SubmitType::class)

            ->getForm();

        $Form2->handleRequest($request);
        if($Form2->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($vote);
            $em->flush();
            return $this->redirectToRoute('une_Recette',array('id'=>$id));
        }
        //note

        $note=$this->getDoctrine()->getRepository('AcceuilBundle:Vote')
            ->findByidrecette($id);

        $a=count($note);



        return $this->render("RecetteBundle:Recette:afficherRecette.html.twig",
            array("r"=>$recette,
                "c"=>$commentaire,
                "b" =>$Form->createView(),
                "v" =>$Form2->createView(),
                "note"=>$a,
                "xx"=>$note));
    }
    public function modifierRecetteAction(Request $request,$id)
    {     $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("AcceuilBundle:Recette")->find($id);
        $Form=$this->createFormBuilder($modele)
            ->add('nom')
            ->add('nomImage',FileType::class,array('data_class' => null))
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
            ->add('astuces',TextareaType::class)

            ->add('ingredients',TextareaType::class)
            ->add('etapes',TextareaType::class)
            ->add('Modifier',SubmitType::class)

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
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute("une_Recette",array("id"=>$id));
        }


        return $this->render("RecetteBundle:Recette:modifierRecette.html.twig",array("a"=>$Form->createView()));
    }
    public function supprimerRecetteAction($id)
    {   $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("AcceuilBundle:Recette")->find($id);

        $em->remove($modele);
        $em->flush();
        $user = $this->getUser()->getId();
        return $this->redirectToRoute('mes_Recettes',array('id'=>$user));
    }
    public function listRecettesAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $recette=$em->getRepository("AcceuilBundle:Recette")->findAll();

        return $this->render("RecetteBundle:Recette:listRecettes.html.twig",array("r"=>$recette));
    }

    public function topRecettesAction(Request $request)
    {   $em=$this->getDoctrine()->getManager();

        $vote=$em->getRepository("AcceuilBundle:Vote")->topRecette();



        return $this->render("RecetteBundle:Recette:top.html.twig",array("v"=>$vote));

    }
    public function RechRecetteDQLAction(Request $request)
    {



       $em = $this->getDoctrine()->getManager();

        //1- rechercher avencé
        $defaultData = array('message' => 'Type your message here'); //defaultdata replacing class and return array
        $Form = $this->createFormBuilder($defaultData)
            ->add('type',TextType::class,array(
                'required'=>false,
            ))
            ->add('cout',TextType::class,array(
                'required'=>false,
            ))
            ->add('difficulte',TextType::class,array(
                'required'=>false,
            ))
            ->add('Valider',SubmitType::class)
            ->getForm();
            $Form->handleRequest($request);
        if($Form->isValid()){
            $type = $Form['type']->getData();
            $cout = $Form['cout']->getData();
            $difficulte = $Form['difficulte']->getData();

            // find by depending on filter choosed by user
            if(is_string($type)=="" ){ //find by cout and difficulte
                $recettes = $em->getRepository('AcceuilBundle:Recette')
                    ->findBy(array('cout'=>$cout,'difficulte'=>$difficulte));
            }
            elseif (is_string($cout)=="" ){//find by type and difficulte
                $recettes = $em->getRepository('AcceuilBundle:Recette')
                    ->findBy(array('type'=>$type,'difficulte'=>$difficulte));
            }
            elseif (is_string($difficulte)=="" ){ // fin by type and cout
                $recettes = $em->getRepository('AcceuilBundle:Recette')
                    ->findBy(array('type'=>$type,'cout'=>$cout));
            }

            else{ //find by 3 criteria
                $recettes = $em->getRepository('AcceuilBundle:Recette')
                ->findBy(array('type'=>$type,'cout'=>$cout,'difficulte'=>$difficulte));
            }


        }
        else{  $recettes = $em->getRepository('AcceuilBundle:Recette')
            ->findAll();

        }

        return $this->render(
            'RecetteBundle:Recette:recherche.html.twig',
            array("recettes" => $recettes,
                "form" => $Form->createView()));
    }
    public function RecetteTypesAction()
    {





        return $this->render("RecetteBundle:Recette:typesRecettes.html.twig");

    }
    public function RecettesParTypeAction($type)
    {
        $em=$this->getDoctrine()->getManager();
        $recette=$em->getRepository("AcceuilBundle:Recette")->findBytype($type);


       // $this->redirectToRoute('RecettesParType',array('type'=>$type));


      return $this->render("RecetteBundle:Recette:RecettesParType.html.twig",array("r"=>$recette));

    }

}
