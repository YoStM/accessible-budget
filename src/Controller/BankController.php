<?php

namespace App\Controller;

use App\Entity\Bank;
use App\Service\BankService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion_banque')]
class BankController extends AbstractController
{
    #[Route('/mes_banques', name: 'banks')]
    public function index(): Response
    {
        return $this->render('bank/index.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }

    #[Route('/Ma_banque/{$id}', name: 'bank_details')]
    public function bankDetails(BankService $bs, int $id):Response
    {
        /**/
        $bank = $bs->getBank($id);
        return $this->render('bank/details.html.twig',['bank'=> $bank]);
    }

    #[Route('/ajouter_banque')]
    public function AddBank(Request $req ,BankService $bs):Response
    {
        $form = $this->createForm(CreateBanktype::class);
        $form->handleRequest($req);

        $bs->createBank($_REQUEST['']);

        return $this->render('bank/addBank.html.twig',['bankForm'=> $form->createView()]);
    }
}
