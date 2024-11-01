<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['Electronics', 'Books', 'Clothing', 'Home'];

        for ($i = 1; $i <= 10; $i++) {
            $product = new Product();
            $product->setName("Product $i")
                ->setDescription("Description for product $i")
                ->setPrice(mt_rand(10, 100))
                ->setCategory($categories[array_rand($categories)]);

            $manager->persist($product);
        }
        $manager->flush();
    }
}
