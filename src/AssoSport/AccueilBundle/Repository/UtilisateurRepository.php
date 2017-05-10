<?php

namespace AssoSport\AccueilBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UtilisateurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UtilisateurRepository extends \Doctrine\ORM\EntityRepository
{
	public function myFindAll(){
  		return $this
    		->createQueryBuilder('u')
    		->getQuery()
    		->getResult()
  			;
	}

  public function myFindOne()
  {
    $qb = $this->createQueryBuilder('utilisateur');

    $qb
      ->where('utilisateur.prenom = :pre')
      ->setParameter('pre', 'Marie')
    ;

    return $qb
      ->getQuery()
      ->getSingleResult()
    ;
  }

  public function findUtilisateurAsso()
  {
    $qb = $this->createQueryBuilder('a');

    $qb
      ->where('a.adherent = :reponse')
      ->setParameter('reponse', true)
    ;

    return $qb
      ->getQuery()
      ->getResult()
    ;
  }

  public function findUtilisateurProjet($projet)
  {
    $qb = $this->createQueryBuilder('u');

    $qb
      //->where(':projet IN(u.projets)')
      //->setParameter('projet', $projet)

      ->add('where', $qb->expr()->in('u.projets', $projet));
      //->add('where', ($projet . ' IN', (array) 'u.projets'))
    ;
    

    return $qb
      ->getQuery()
      ->getResult()
    ;
  }

  public function findDemandes()
  {
    $qb = $this->createQueryBuilder('u');

    $qb
      ->where('u.demande = :reponse')
      ->setParameter('reponse', 1)
    ;

    return $qb
      ->getQuery()
      ->getResult()
    ;
  }


}
