<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    // PART A: the data lives here now, in ONE private helper.
    // Every method below asks this helper for the products.
    // The key (1, 2, 3...) matches each product's id, so one product
    // can be found with a single lookup instead of a loop.
    private function getProducts()
    {
        return [
            1 => ['id' => 1, 'name' => 'Bottled Water 500ml', 'price' => 15, 'stock' => 120, 'category' => 'Drinks'],
            2 => ['id' => 2, 'name' => 'Instant Noodles',     'price' => 12, 'stock' => 200, 'category' => 'Pantry'],
            3 => ['id' => 3, 'name' => 'Canned Sardines',     'price' => 25, 'stock' => 80,  'category' => 'Canned'],
            4 => ['id' => 4, 'name' => 'Sliced Bread',        'price' => 60, 'stock' => 30,  'category' => 'Bakery'],
            5 => ['id' => 5, 'name' => '3-in-1 Coffee',       'price' => 8,  'stock' => 300, 'category' => 'Drinks'],
            6 => ['id' => 6, 'name' => 'Corned Beef',         'price' => 45, 'stock' => 60,  'category' => 'Canned'],
            7 => ['id' => 7, 'name' => 'Pandesal Pack',       'price' => 20, 'stock' => 50,  'category' => 'Bakery'],
            8 => ['id' => 8, 'name' => 'Rice 1kg',            'price' => 55, 'stock' => 70,  'category' => 'Pantry'],
        ];
    }

    // The list page. Same as LA2, but the data now comes from the helper.
    public function index()
    {
        $products = $this->getProducts();

        return view('products.index', ['products' => $products]);
    }

    // PART B: the detail page, for example /products/7
    public function show($id)
    {
        $products = $this->getProducts();

        // Is there a product with this id? If not, stop and show a proper 404 page.
        if (!isset($products[$id])) {
            abort(404);
        }

        return view('products.show', [
            'product' => $products[$id],
            'heading' => 'Product Details',
        ]);
    }

    // PART C: the featured page, /products/featured (no id in the URL)
    public function featured()
    {
        $products = $this->getProducts();

        return view('products.show', [
            'product' => $products[5],   // product 5 (3-in-1 Coffee) is my featured pick
            'heading' => 'Featured Product',
        ]);
    }

    // PART D: the filter page, for example /products/filter/Drinks
    // The "= null" makes the value optional. No value means "show everything".
    public function filter($category = null)
    {
        $products = $this->getProducts();
        $matches = [];

        foreach ($products as $product) {
            // No category typed? Keep every product. Otherwise keep only the matching ones.
            if ($category === null || strtolower($product['category']) === strtolower($category)) {
                $matches[] = $product;
            }
        }

        return view('products.filter', [
            'products' => $matches,
            'category' => $category,
        ]);
    }
}
