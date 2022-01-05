<?php

namespace App\Repository;

use App\Entity\Bank;
use App\RepositoryInterface\BankRepositoryInterface;
use Doctrine\ORM\EntityManager;
use mysql_xdevapi\Exception;


class BankRepository implements BankRepositoryInterface
{

    private EntityManager $entityManager;
    private $objectRepository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Bank::class);
    }

    public function find(int $BankId):Bank
    {
        return $this->objectRepository->find($BankId);
    }

    public function findOneByName(String $BankName):Bank
    {
        return $this->objectRepository->findOneBy(['name' => $BankName]);
    }

    public function findOneById(int $BankId):Bank
    {
        return $this->objectRepository->findOneBy(['id' => $BankId]);
    }

    public function saveBank(Bank $bank):bool
    {
            $this->entityManager->persist($bank);
            $this->entityManager->flush();
            return true;
    }

    public function createBank(Bank $bank): bool
    {
        try
        {
            $this->entityManager->persist($bank);
            $this->entityManager->flush();
            return true;

        } catch (Exception $exception)
        {
            return false;
            echo $exception;

        }
    }

    public function updateBank(int $bankId): bool
    {
        // TODO: Implement updateBank() method.

        return true;
    }

    public function deleteBank(int $bankId): bool
    {
        // TODO: Implement deleteBank() method.

        return true;
    }
    // /**
    //  * @return Bank[] Returns an array of Bank objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bank
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
