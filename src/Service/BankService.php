<?php

namespace App\Service;

use App\Entity\Bank;
use App\Repository\BankRepository;
use App\RepositoryInterface\BankRepositoryInterface;

class BankService
{
    private BankRepository $bankRepository;

    public function __construct(BankRepositoryInterface $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    public function getBank(int $bankId):Bank
    {
        return $this->bankRepository->findOneById($bankId);
    }

    public function createBank(String $code, String $name):bool
    {
        $bank = new Bank();
        $bank->setCode($code);
        $bank->setName($name);
        $this->bankRepository->createBank($bank);
        return true;
    }

}