<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class ProductController extends AbstractController
{
    #[Route('/', name: 'product_list')]
    public function index(): Response
    {
        return $this->render('product_list.html.twig');
    }
}



