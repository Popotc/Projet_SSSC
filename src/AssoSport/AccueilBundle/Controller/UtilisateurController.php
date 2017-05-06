<?php

namespace AssoSport\AccueilBundle\Controller;

use AssoSport\AccueilBundle\Entity\Utilisateur;
use AssoSport\AccueilBundle\Entity\Projet;
use AssoSport\AccueilBundle\Entity\Sport;
use AssoSport\AccueilBundle\Entity\Profil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AssoSport\AccueilBundle\Form\UtilisateurType;
use AssoSport\AccueilBundle\Form\SportType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UtilisateurController extends Controller
{
  public function printAction(Request $request)
  {
    // Création de l'entité
    $utilisateur = new Utilisateur();
    $utilisateur->setNom('Dubois');
    $utilisateur->setPrenom('Bernard');
    $utilisateur->setTaille(177);
    $utilisateur->setAge(88);
    $utilisateur->setPoids(95);
    $utilisateur->setSexe('M');
    $utilisateur->setAdresseMail('bernarddubois@ici.fr');
    $utilisateur->setMotDePasse('bernarddubois');
    $utilisateur->setSalt('bernard');
    $utilisateur->setAdherent('true');

    $repository = $this
      ->getDoctrine()
      ->getManager()
      ->getRepository('AssoSportAccueilBundle:Profil')
    ;
    $profil = $repository->findOneByNom('Moyennement Actif');

    $utilisateur->setProfilActuel($profil);


    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getManager();

    // Étape 1 : On « persiste » l'entité
    $em->persist($utilisateur);

    // Étape 2 : On « flush » tout ce qui a été persisté avant
    $em->flush();

    
    if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Inscription bien enregistrée.');

      // Puis on redirige vers la page de visualisation des adhérents
      return $this->redirectToRoute('asso_sport_accueil_liste');
    }

    // Si on n'est pas en POST, alors on affiche le formulaire
    return $this->render('AssoSportAccueilBundle:Utilisateur:print.html.twig', array('utilisateur' => $utilisateur));
  }

  public function listeAction()
  {
    $repository = $this
      ->getDoctrine()
      ->getManager()
      ->getRepository('AssoSportAccueilBundle:Utilisateur')
    ;
    
    $listeUtilisateurs = $repository->myFindAll();

    return $this->render('AssoSportAccueilBundle:Utilisateur:liste.html.twig', array('utilisateurs' => $listeUtilisateurs));
  }

  public function trouveAction()
  {
    $repository = $this
      ->getDoctrine()
      ->getManager()
      ->getRepository('AssoSportAccueilBundle:Utilisateur')
    ;
    
    $utilisateur = $repository->myFindOne();

    return $this->render('AssoSportAccueilBundle:Utilisateur:trouve.html.twig', array('utilisateur' => $utilisateur));
  }
  
  
  public function formulaireAction(Request $request)
  {
    $utilisateur = new Utilisateur();
    $form   = $this->get('form.factory')->create(UtilisateurType::class, $utilisateur);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($utilisateur);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      return $this->redirectToRoute('asso_sport_accueil_liste');
    }

    return $this->render('AssoSportAccueilBundle:Utilisateur:formulaire.html.twig', array(
      'form' => $form->createView(),
    ));
    
  }

}
