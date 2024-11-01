<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class ProductController extends AbstractController
{
    #[Route('/', name: 'product_list')]
    public function index(Request $request, ProductRepository $productRepository): Response
    {
        $category = $request->query->get('category');
        $order = $request->query->get('order', 'ASC'); // Default to ascending order

        // Fetch products based on the category and order
        if ($category) {
            $products = $productRepository->findByCategoryAndOrder($category, $order);
        } else {
            $products = $productRepository->findAllProductsOrderedByPrice($order);
        }

        return $this->render('product_list.html.twig', [
            'products' => $products,
            'categories' => $productRepository->findAllCategories(),
            'selectedCategory' => $category,
            'currentOrder' => $order,
        ]);
    }
}



