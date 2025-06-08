<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyController extends AbstractController
{
    #[Route('/buy', name: 'buy')]
    public function index(): Response
    {
        return $this->render('buy/index.html.twig', [
            'packages' => [
                ['hours' => 5, 'price' => 50],
                ['hours' => 10, 'price' => 90],
                ['hours' => 20, 'price' => 160],
            ]
        ]);
    }
}
