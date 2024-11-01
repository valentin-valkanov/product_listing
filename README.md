
# Product Listing Page
# Product Listing Page

![PHP Version](https://img.shields.io/badge/PHP-8.2.12-brightgreen)
![Symfony Version](https://img.shields.io/badge/Symfony-7.1.*-blue)

This project is a simple product listing page, created as a test task. The page displays a list of products with options to filter by category and sort by price. It’s built using Symfony and demonstrates fundamental skills in web development and database interaction.
## Features

- **Product Display**: Lists all products in a table format, showing each product's name, description, category, and price.
- **Category Filtering**: A dropdown filter allows users to view products in a specific category.
- **Price Sorting**: Users can sort products by price in ascending or descending order.
- **Dynamic Table Updates**: The product table updates dynamically based on selected category and sorting order.

## Setup Instructions

**1. Clone the repository:**

```
git clone https://github.com/yourusername/product_listing.git
```

**2. Install dependencies:**

```
composer install
```

**3. Database setup:**

- Create a database (using Docker if applicable) and configure it in the .env file.
- Run migrations to create the tables:
```
php bin/console doctrine:migrations:migrate
```
or
```
symfony console doctrine:migrations:migrate
```
in case database is running on a Docker container

- Load sample data with Doctrine Fixtures:
```
php bin/console doctrine:fixtures:load
```
or

```
symfony console doctrine:fixtures:load 
```
in case database is running on a Docker container

**4. Run the local server:**

```
symfony serve -d
```

Access the application at http://localhost:8000.

## Project Structure and Key Code Highlights

- **Controller** (```ProductController```): Handles the main logic for displaying the product list, filtering by category, and ordering by price.
- **Repository** (```ProductRepository```): Provides methods for fetching products with optional filtering by category and ordering by price.
- **Twig Template** (```product_list.html.twig```): Renders the product list, the category filter dropdown, and the sorting options.
- **Entity** (`Product`): Defines the `Product` model, with attributes for `name`, `description`, `category`, and `price`. Each attribute represents a column in the database, making the `Product` class an ORM representation of a product record.
- **Fixtures** (`ProductFixture`): Contains sample data for seeding the database. This class provides a set of default `Product` entries to quickly populate the database, which is useful for testing and development.