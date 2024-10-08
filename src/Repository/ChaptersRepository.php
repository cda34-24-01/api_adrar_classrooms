<?php

namespace App\Repository;

use App\Entity\Chapters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Chapters>
 */
class ChaptersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chapters::class);
    }


    function getChaptersCoursId(int $CoursesId): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id', 'c.title', 'c.level', 'c.estimated_time', 'c.created_at', 'c.updated_at', 'c.files', 'c.validated', 'c.language_id')
            ->where('c.id = $CoursesId')
            ->getQuery()
            ->getResult();
    }
}
