<?php

namespace App\RepositoryInterface;

use App\Entity\Bank;

interface BankRepositoryInterface
{
    public function find(int $BankId):Bank;
    public function findOneByName(String $BankName):Bank;
    public function findOneById(int $BankId):Bank;
    public function saveBank(Bank $bank):bool;
    public function createBank(Bank $bank):bool;
    public function updateBank(int $bankId):bool;
    public function deleteBank(int $bankId):bool;
}