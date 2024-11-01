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
            $products = $productRepository->findByCategory($category);
        } else {
            $products = $productRepository->findAllProductsOrderedByPrice($order);
        }

        $categories = $productRepository->findAllCategories();

        return $this->render('product_list.html.twig', [
            'products' => $products,
            'currentOrder' => $order,
            'categories' => $categories, // Pass categories to the template
            'selectedCategory' => $category, // Pass the selected category to the template
        ]);
    }
}



