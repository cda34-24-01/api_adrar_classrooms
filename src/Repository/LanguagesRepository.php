<?php

namespace App\Repository;

use App\Entity\Languages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\AST\WhereClause;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Languages>
 */
class LanguagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Languages::class);
    }

    function getLanguages(string $sTitle)
    {
        return $this->createQueryBuilder('l')
            ->select('l.id', 'l.title', 'l.img')
            ->where('l.title = $sTitle')
            ->getQuery()
            ->getResult();
    }

    function getAllLanguages()
    {
        return $this->createQueryBuilder('l')
            ->select('l.id', 'l.title', 'l.img')
            ->getQuery()
            ->getResult();
    }
}
