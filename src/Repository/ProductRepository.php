<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findAllCategories(): array
    {
        return $this->createQueryBuilder('p')
            ->select('p.category')
            ->distinct()
            ->getQuery()
            ->getResult();
    }

    public function findByCategoryAndOrder(string $category, string $order = 'ASC'): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.category = :category')
            ->setParameter('category', $category)
            ->orderBy('p.price', $order)
            ->getQuery()
            ->getResult();
    }

    public function findAllProductsOrderedByPrice(string $order = 'ASC'): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.price', $order)
            ->getQuery()
            ->getResult();
    }
}
